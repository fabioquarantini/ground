/* eslint-disable no-unused-vars */
import { initObserver } from '../utilities/observer'
import { getTemplateUrl } from '../utilities/paths'
import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import * as THREE from 'three'
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls.js'
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader.js'
import { RectAreaLightHelper } from 'three/examples/jsm/helpers/RectAreaLightHelper.js'
import * as dat from 'dat.gui'

gsap.registerPlugin(ScrollTrigger)

export default class animationWebGl {
	constructor() {
		this.element = '[data-scroll="js-webgl"]'
		this.DOM = {
			html: document.documentElement,
			body: document.body,
		}
		this.options = { triggers: this.element }
		this.updateEvents = this.updateEvents.bind(this)
		window.addEventListener('DOMContentLoaded', () => {})
		window.addEventListener('LOADER_COMPLETE', () => {
			this.init()
			this.initEvents(this.options.triggers)
			initObserver(this.options.triggers, this.updateEvents)
		})
	}

	/**
	 * Init
	 */
	init() {
		this.DOM.element = document.querySelectorAll(this.element)
	}

	/**
	 * Initialize events
	 * @param {string} triggers - Selectors
	 */
	initEvents(triggers) {
		gsap.utils.toArray(triggers).forEach((element) => {
			this.startAnimation(element)
		})
	}

	/**
	 * Update events
	 * @param {Object} target - New selector
	 */
	updateEvents(target) {
		this.init()
		this.startAnimation(target)
	}

	/**
	 *  Start Animation
	 */
	startAnimation(item) {

		const target = item.querySelector('[data-scroll-target]')
		const canvas = item.querySelector('[data-scroll-canvas]')
		const targetScrub = parseInt(item.dataset.scrollScrub, 10)
		const templateUrl = getTemplateUrl()

		/**
		 * Loaders
		 */
		const gltfLoader = new GLTFLoader()
		const cubeTextureLoader = new THREE.CubeTextureLoader()

		/**
		 * Base
		 */
		// Debug
		const gui = new dat.GUI()
		const debugObject = {}
		gui.hide()

		// Scene
		const scene = new THREE.Scene()


		// Sizes
		const sizes = {
			width: window.innerWidth,
			height: window.innerHeight
		}

		window.addEventListener('resize', () => {
			// Update sizes
			sizes.width = window.innerWidth
			sizes.height = window.innerHeight
		
			// Update camera
			camera.aspect = sizes.width / sizes.height
			camera.updateProjectionMatrix()
		
			// Update renderer
			renderer.setSize(sizes.width, sizes.height)
			renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2))
		})

		

		/**
		 * Update all materials
		 */

		let sceneWireframe = false

		const updateAllMaterials = () => {
			scene.traverse((child) => {
				if (child instanceof THREE.Mesh && child.material instanceof THREE.MeshStandardMaterial) {
					// child.material.envMap = environmentMap
					child.material.envMapIntensity = debugObject.envMapIntensity
					child.material.needsUpdate = true
					child.castShadow = true
					child.receiveShadow = true

					child.material.wireframe = sceneWireframe
					// child.material.depthTest = true
					// child.material.opacity = 0.3;
					// child.material.transparent = true
				}
			})
		}

		/**
		 * Environment map
		 */
		const environmentMap = cubeTextureLoader.load([
			templateUrl + '/img/textures/environmentMaps/2/px.jpg',
			templateUrl + '/img/textures/environmentMaps/2/nx.jpg',
			templateUrl + '/img/textures/environmentMaps/2/py.jpg',
			templateUrl + '/img/textures/environmentMaps/2/ny.jpg',
			templateUrl + '/img/textures/environmentMaps/2/pz.jpg',
			templateUrl + '/img/textures/environmentMaps/2/nz.jpg'
		])
		environmentMap.encoding = THREE.sRGBEncoding
		// scene.background = environmentMap
		scene.environment = environmentMap

		debugObject.envMapIntensity = 5
		gui.add(debugObject, 'envMapIntensity').min(0).max(10).step(0.001).onChange(updateAllMaterials)


		let mixer = null
		/**
		 * Models
		 */

		gltfLoader.load(
			templateUrl + '/img/models/iphone_12_pro/scene.gltf',
			(gltf) => {

				// Animate
				mixer = new THREE.AnimationMixer(gltf.scene)
				if (gltf.animations[0]) {
					const action = mixer.clipAction(gltf.animations[0])
					action.play()
				}

				gltf.scene.scale.set(0.04, 0.04, 0.04)
				gltf.scene.position.set(0, - 4, 0)
				gltf.scene.rotation.y = Math.PI * 0.25
				gltf.scene.rotation.z = Math.PI * 0.2

				scene.add(gltf.scene)

				gui.add(gltf.scene.rotation, 'y').min(- Math.PI).max(Math.PI).step(0.001).name('rotation Y')
				gui.add(gltf.scene.rotation, 'z').min(- Math.PI).max(Math.PI).step(0.001).name('rotation Z')


				updateAllMaterials()
			  	scrollAnimate(gltf.scene)

			}
		)


		/**
		 * Lights
		 */
		const directionalLight = new THREE.DirectionalLight('#ffffff', 3)
		directionalLight.position.set(0.25, 3, -2.25)
		directionalLight.castShadow = true
		directionalLight.shadow.camera.far = 15
		directionalLight.shadow.mapSize.set(1024, 1024)
		scene.add(directionalLight)

		// const directionalLightCameraHelper = new THREE.CameraHelper(directionalLight.shadow.camera)
		// scene.add(directionalLightCameraHelper)

		gui.add(directionalLight, 'intensity').min(0).max(10).step(0.001).name('lightIntensity')
		gui.add(directionalLight.position, 'x').min(- 5).max(5).step(0.001).name('lightX')
		gui.add(directionalLight.position, 'y').min(- 5).max(5).step(0.001).name('lightY')
		gui.add(directionalLight.position, 'z').min(- 5).max(5).step(0.001).name('lightZ')

		

		/**
		 * Objects
		 */
		// Material
		const material = new THREE.MeshStandardMaterial()
		material.roughness = 0.4
		material.wireframe = false

		const cube = new THREE.Mesh(
			new THREE.BoxGeometry(2, 2, 2),
			material
		)

		cube.receiveShadow = true
		cube.wireframe = true
		scene.add(cube)

		// Debug
		// gui.add(cube.rotation, 'x').min(0).max(100).step(1).name('Cube Rotation')
		gui.add(cube, 'visible')
		gui.add(material,'wireframe')
		gui.addColor

		/**
		 * Camera
		 */
		// Base camera
		const camera = new THREE.PerspectiveCamera(75, sizes.width / sizes.height, 0.1, 100)
		camera.position.set(4, 1, - 4)
		scene.add(camera)


		//Orbit Controls
		const controls = new OrbitControls(camera, canvas)
		controls.enableDamping = true
		controls.enableZoom = false
		controls.enablePan = false
		controls.autoRotate = false
		controls.enabled = true

		/**
		 * Renderer
		 */
		const renderer = new THREE.WebGLRenderer({
			canvas: canvas,
			// alpha: true,
			antialias: true
		})
		renderer.setSize(sizes.width, sizes.height)
		renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2))
		renderer.physicallyCorrectLights = true
		renderer.outputEncoding = THREE.sRGBEncoding
		renderer.toneMapping = THREE.ACESFilmicToneMapping
		renderer.toneMappingExposure = 3
		renderer.shadowMap.enabled = true
		renderer.shadowMap.type = THREE.PCFSoftShadowMap


		gui
			.add(renderer, 'toneMapping', {
				No: THREE.NoToneMapping,
				Linear: THREE.LinearToneMapping,
				Reinhard: THREE.ReinhardToneMapping,
				Cineon: THREE.CineonToneMapping,
				ACESFilmic: THREE.ACESFilmicToneMapping
			})
			.onFinishChange(() => {
				renderer.toneMapping = Number(renderer.toneMapping)
				updateAllMaterials()
			})

		gui.add(renderer, 'toneMappingExposure').min(0).max(10).step(0.001)


		/**
		 * Animate
		 */
		const clock = new THREE.Clock()
		let previousTime = 0

		const tick = () => {

			const elapsedTime = clock.getElapsedTime()
			const deltaTime = elapsedTime - previousTime
			previousTime = elapsedTime

			// Update controls
			controls.update()

			//Update mixer
			if(mixer)
			{
				mixer.update(deltaTime)
			}

			// Render
			renderer.render(scene, camera)

			// Call tick again on the next frame
			window.requestAnimationFrame(tick)
		}

		tick()

		// console.log(scene.children)
		// console.log(scene.children.PerspectiveCamera)

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: target,
				start: 'center center',
				end: '+=200%',
				scrub: targetScrub || false,
				pin: true,
				toggleActions: 'play none play reverse',
			},
		})

		const scrollAnimate = (model) => {


			tl
				.from(cube.rotation, { z: 4 })
				// .from(camera.position, { y: 4, x: 4 })
				.from(model.rotation, { x: 0, y: -0.4, z: 0 })

		}
	
	}

}