/* eslint-disable no-unused-vars */
import { initObserver } from '../utilities/observer'

import { getTemplateUrl } from '../utilities/paths'

import * as deepmerge from 'deepmerge'
import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import { SplitText } from 'gsap/SplitText'
import { DrawSVGPlugin } from 'gsap/DrawSVGPlugin'
import { MorphSVGPlugin } from 'gsap/MorphSVGPlugin'


import * as THREE from 'three'
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls.js'
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader.js'
import { RectAreaLightHelper } from 'three/examples/jsm/helpers/RectAreaLightHelper.js'
import * as dat from 'dat.gui'

gsap.registerPlugin(ScrollTrigger, SplitText, DrawSVGPlugin, MorphSVGPlugin)

export default class AnimationsThree {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		this.element = element || '[data-scroll]'
		this.defaults = {
			triggers: this.element,
		}
		this.DOM = {
			html: document.documentElement,
			body: document.body,
		}
		this.options = options
			? deepmerge(this.defaults, options)
			: this.defaults
		this.updateEvents = this.updateEvents.bind(this)

		window.addEventListener('DOMContentLoaded', () => { })

		ScrollTrigger.addEventListener('scrollStart', () => { })

		ScrollTrigger.addEventListener('scrollEnd', () => { })

		ScrollTrigger.addEventListener('refreshInit', () => { })

		ScrollTrigger.addEventListener('refresh', () => { })

		window.addEventListener('NAVIGATE_OUT', () => {
			// ScrollTrigger.update();
			// ScrollTrigger.refresh();
		})

		window.addEventListener('resize', () => {
			// ScrollTrigger.update();
			// ScrollTrigger.refresh();
		})

		window.addEventListener('NAVIGATE_IN', () => { })

		window.addEventListener('NAVIGATE_END', () => { })

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
		ScrollTrigger.defaults({
			markers: false,
			ease: 'power3',
		})

		gsap.utils.toArray(triggers).forEach((element) => {
			if (element.dataset.scroll === 'js-splittext-chars') {
				this.splitTextAnimationChars(element)
			} else if (element.dataset.scroll === 'js-splittext-lines') {
				this.splitTextAnimationLines(element)
			} else if (element.dataset.scroll === 'js-rotation') {
				this.rotationAnimation(element)
			} else if (element.dataset.scroll === 'js-batch') {
				this.batchAnimation(element)
			} else if (element.dataset.scroll === 'js-scale') {
				this.scaleAnimation(element)
			} else if (element.dataset.scroll === 'js-draw-svg') {
				this.drawSvgAnimation(element)
			} else if (element.dataset.scroll === 'js-background-color') {
				this.backgroundColorAnimation(element)
			} else if (element.dataset.scroll === 'js-pin') {
				this.pinAnimation(element)
			} else if (element.dataset.scroll === 'js-pin-image-sequence') {
				this.pinImageSequence(element)
			} else if (element.dataset.scroll === 'js-pin-horizontal') {
				this.pinHorizontalAnimation(element)
			} else if (element.dataset.scroll === 'js-pin-horizontal-section') {
				this.pinHorizontalSectionAnimation(element)
			} else if (element.dataset.scroll === 'js-pin-vertical') {
				this.pinVerticalAnimation(element)
			} else if (element.dataset.scroll === 'js-comparison') {
				this.comparisonAnimation(element)
			} else if (element.dataset.scroll === 'js-parallax') {
				this.parallaxAnimation(element)
			} else if (element.dataset.scroll === 'js-video') {
				this.videoAnimation(element)
			} else if (element.dataset.scroll === 'js-three') {
				this.threeAnimation(element)
			} else {
				this.defaultAnimation(element)
			}
		})
	}

	/**
	 * Update events
	 * @param {Object} target - New selector
	 */
	updateEvents(target) {
		this.init()
		// console.log(target.dataset.scroll);

		setTimeout(() => {
			if (target.dataset.scroll === 'js-splittext-chars') {
				this.splitTextAnimationChars(target)
			} else if (target.dataset.scroll === 'js-splittext-lines') {
				this.splitTextAnimationLines(target)
			} else if (target.dataset.scroll === 'js-rotation') {
				this.rotationAnimation(target)
			} else if (target.dataset.scroll === 'js-batch') {
				this.batchAnimation(target)
			} else if (target.dataset.scroll === 'js-scale') {
				this.scaleAnimation(target)
			} else if (target.dataset.scroll === 'js-draw-svg') {
				this.drawSvgAnimation(target)
			} else if (target.dataset.scroll === 'js-background-color') {
				this.backgroundColorAnimation(target)
			} else if (target.dataset.scroll === 'js-pin') {
				this.pinAnimation(target)
			} else if (target.dataset.scroll === 'js-pin-image-sequence') {
				this.pinImageSequence(target)
			} else if (target.dataset.scroll === 'js-pin-horizontal') {
				this.pinHorizontalAnimation(target)
			} else if (target.dataset.scroll === 'js-pin-horizontal-section') {
				this.pinHorizontalSectionAnimation(target)
			} else if (target.dataset.scroll === 'js-pin-vertical') {
				this.pinVerticalAnimation(target)
			} else if (target.dataset.scroll === 'js-comparison') {
				this.comparisonAnimation(target)
			} else if (target.dataset.scroll === 'js-parallax') {
				this.parallaxAnimation(target)
			} else if (target.dataset.scroll === 'js-three') {
				this.threeAnimation(target)
			} else if (target.dataset.scroll === 'js-video') {
				this.videoAnimation(target)
			} else {
				this.defaultAnimation(target)
			}
		}, 1000)
	}

	/**
	 * default Animation
	 */
	defaultAnimation(item) {
		const targetClass = item.dataset.scroll

		ScrollTrigger.create({
			trigger: item,
			start: 'top 100%',
			toggleClass: targetClass,
			toggleActions: 'play none none none',
			// markers: true,
			// once: true,
		})
	}

	/**
	 * splitText Animation Chars
	 */
	splitTextAnimationChars(item) {
		gsap.set(item, { autoAlpha: 1 })

		const splitText = new SplitText(item, {
			type: 'chars, words',
		})
		const target = splitText.chars
		const targetScrub = parseInt(item.dataset.scrollScrub, 10)

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				start: 'top 90%',
				end: 'bottom 60%',
				scrub: targetScrub || false,
				toggleActions: 'play none play reset',
			},
		})

		tl.from(target, {
			yPercent: 100,
			opacity: 0,
			stagger: 0.05,
			duration: 0.5,
			ease: 'back.inOut',
		})
	}

	/**
	 * splitText Animation Lines
	 */
	splitTextAnimationLines(item) {
		gsap.set(item, { autoAlpha: 1 })

		const splitText = new SplitText(item, {
			type: 'lines',
		})
		const target = splitText.lines
		const targetScrub = parseInt(item.dataset.scrollScrub, 10)

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				start: 'top 90%',
				end: 'bottom 60%',
				scrub: targetScrub || false,
				toggleActions: 'play none play reset',
			},
		})

		tl.from(target, {
			y: 20,
			opacity: 0,
			stagger: 0.01,
			duration: 0.01,
		})
	}

	/**
	 * rotation Animation
	 */
	rotationAnimation(item) {
		gsap.set(item, { autoAlpha: 1 })

		const targetScrub = parseInt(item.dataset.scrollScrub, 10)
		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				start: 'top 90%',
				end: 'bottom 80%',
				scrub: targetScrub || false,
				toggleActions: 'play none play reverse',
			},
		})

		tl.from(item, {
			x: 400,
			rotation: 360,
		})
	}

	/**
	 * batch Animation
	 */
	batchAnimation(item) {
		gsap.set(item, { autoAlpha: 1 })

		const target = item.querySelectorAll('[data-scroll-target]')

		// gsap.set(target, { y: 100, opacity: 0 });

		ScrollTrigger.batch(target, {
			interval: 0.1, // time window (in seconds) for batching to occur.
			batchMax: 3, // maximum batch size (targets)
			onEnter: (batch) =>
				gsap.to(batch, { autoAlpha: 1, stagger: 0.1, overwrite: true }),
			onLeave: (batch) =>
				gsap.set(batch, { autoAlpha: 0, overwrite: true }),
			onEnterBack: (batch) =>
				gsap.to(batch, { autoAlpha: 1, stagger: 0.1, overwrite: true }),
			onLeaveBack: (batch) =>
				gsap.set(batch, { autoAlpha: 0, overwrite: true }),
		})
		ScrollTrigger.addEventListener('refreshInit', () =>
			gsap.set(target, { y: 0 })
		)
	}

	/**
	 * scale Animation
	 */
	scaleAnimation(item) {
		gsap.set(item, { autoAlpha: 1 })

		const targetScrub = parseInt(item.dataset.scrollScrub, 10)

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				start: 'top 100%',
				end: 'bottom 0%',
				scrub: targetScrub || false,
				toggleActions: 'play none play reverse',
			},
		})

		tl.to(item, {
			scale: 1.5,
		})
	}

	/**
	 * parallax Animation
	 */
	parallaxAnimation(item) {
		gsap.set(item, { autoAlpha: 1 })

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				toggleActions: 'play pause none none',
				scrub: 2,
			},
		})

		tl.to(item, {
			y: -item.dataset.scrollSpeedY * 100 || 0,
			x: -item.dataset.scrollSpeedX * 100 || 0,
		})
	}

	/**
	 * video Animation
	 */
	videoAnimation(item) {
		const targetVideo = item.querySelector('[data-scroll-target]')

		gsap.timeline({
			scrollTrigger: {
				trigger: item,
				start: 'top bottom',
				end: 'bottom top',
				markers: false,
				onEnter: () => targetVideo.play(),
				onLeave: () => {
					targetVideo.pause()
					targetVideo.currentTime = 0
				},
				onEnterBack: () => targetVideo.play(),
				onLeaveBack: () => {
					targetVideo.pause()
					targetVideo.currentTime = 0
				},
			},
		})
	}

	/**
	 * darwSvg Animation
	 */
	drawSvgAnimation(item) {
		gsap.set(item, { autoAlpha: 1 })

		const target = item.querySelectorAll('path')
		const targetScrub = parseInt(item.dataset.scrollScrub, 10)

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				scrub: targetScrub || false,
				start: 'top 70%',
				end: 'bottom 70%',
				toggleActions: 'play none play reverse',
			},
		})

		tl.from(target, {
			drawSVG: 0,
		})
	}

	/**
	 * backgroundColor Animation
	 */
	backgroundColorAnimation(item) {
		const target = document.body
		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				scrub: 1,
				toggleActions: 'play reset play reset',
			},
		})

		tl.to(target, {
			backgroundColor: item.dataset.backgroundColor,
			ease: 'power1',
		})
	}

	/**
	 * pin Animation
	 */
	pinAnimation(item) {
		const target = item.querySelector('[data-scroll-target]')
		const targetElement = item.querySelectorAll(
			'[data-scroll-target-animate]'
		)
		const targetScrub = parseInt(item.dataset.scrollScrub, 10)

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: target,
				start: 'center center',
				end: '+=200%',
				toggleClass: 'active',
				pin: true,
				pinReparent: true,
				scrub: targetScrub || false,
				// anticipatePin: 1,
			},
		})

		tl.from(targetElement, {
			scale: 0.6,
			transformOrigin: 'center center',
		})
	}

	/**
	 * pin Image Sequence https://codepen.io/GreenSock/pen/yLOVJxd
	 */
	pinImageSequence(item) {
		const target = item.querySelector('[data-scroll-target]')
		const canvas = item.querySelector('[data-scroll-canvas]')
		const targetContainer = item.querySelector(
			'[data-scroll-target-animate]'
		)

		const context = canvas.getContext('2d')
		const frameCount = parseInt(item.dataset.scrollFrames, 10)
		const framePath = item.dataset.scrollPath

		canvas.width = 900
		canvas.height = 859

		const currentFrame = (index) =>
			`${framePath}/${(index + 1).toString().padStart(4, '0')}.jpg`
		// `https://www.apple.com/105/media/us/airpods-pro/2019/1299e2f5_9206_4470_b28e_08307a42f19b/anim/sequence/large/01-hero-lightpass/${(index + 1).toString().padStart(4, '0')}.jpg`

		const images = []
		const frames = {
			frame: 0,
		}

		for (let i = 0; i < frameCount; i++) {
			const img = new Image()
			img.src = currentFrame(i)
			images.push(img)
		}

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: target,
				start: 'center center',
				end: '+=400%',
				scrub: 0.5,
				pin: true,
				// anticipatePin: 1,
			},
		})

		tl.to(
			frames,
			{
				frame: frameCount - 1,
				snap: 'frame',
				onUpdate: render,
				duration: 20,
			},
			'together'
		).fromTo(
			targetContainer,
			{ scale: 0.95 },
			{ scale: 1, duration: 20 },
			'together'
		)

		images[0].onload = render

		function render() {
			context.clearRect(0, 0, canvas.width, canvas.height)
			context.drawImage(images[frames.frame], 0, 0)
		}
	}



	/**
	 * Three Aimation
	 */
	threeAnimation(item) {
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
			  	// scrollAnimate(gltf.scene)

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

		// const scrollAnimate = (model) => {

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


		tl
			.from(cube.rotation, { z: 4 })
			// .from(model.rotation, { z: 1 })


		// }

	}

	/**
	 * pin Horizontal Animation
	 */
	pinHorizontalAnimation(item) {
		const target = item.querySelector('[data-scroll-target]')
		const targetContainer = item.querySelector(
			'[data-scroll-target-animate]'
		)
		const targetScrub = parseInt(item.dataset.scrollScrub, 10)

		gsap.to(targetContainer, {
			x: () =>
				-targetContainer.getBoundingClientRect().width +
				target.getBoundingClientRect().width,
			ease: 'none',
			scrollTrigger: {
				trigger: target,
				invalidateOnRefresh: true,
				start: 'center center',
				end: () => '+=' + targetContainer.offsetWidth,
				pin: true,
				scrub: targetScrub || false,
			},
		})

		// FIRST VERSION
		// const tl = gsap.timeline({
		// 	scrollTrigger: {
		// 		trigger: target,
		// 		start: 'center center',
		// 		end: () => `+=${targetContainer.offsetWidth}`,
		// 		scrub: targetScrub || false,
		// 		pin: true,
		// 		invalidateOnRefresh: true,
		// 	},
		// })
		// tl.to(
		// 	targetContainer, { x: -targetContainer.getBoundingClientRect().width + target.getBoundingClientRect().width }
		// )
	}

	/**
	 * pin Horizontal Section Animation
	 */
	pinHorizontalSectionAnimation(item) {
		const target = item.querySelector('[data-scroll-target]')
		const section = item.querySelectorAll('[data-scroll-section]')
		const targetScrub = parseInt(item.dataset.scrollScrub, 10)

		const sections = gsap.utils.toArray(section)

		let maxWidth = 0

		const getMaxWidth = () => {
			maxWidth = 0
			sections.forEach((section) => {
				maxWidth += section.offsetWidth
			})
		}
		getMaxWidth()
		ScrollTrigger.addEventListener('refreshInit', getMaxWidth)

		gsap.to(sections, {
			x: () => `-${maxWidth - window.innerWidth}`,
			ease: 'none',
			scrollTrigger: {
				trigger: target,
				pin: true,
				scrub: targetScrub || false,
				start: 'center center',
				end: () => `+=${maxWidth}`,
				invalidateOnRefresh: true,
			},
		})

		// ADD SKEW
		// let proxy = { skew: 0 },
		// 	skewSetter = gsap.quickSetter(section, 'skewX', 'deg'), // fast
		// 	clamp = gsap.utils.clamp(-10, 10) // don't let the skew go beyond [X] degrees.
		// END SKEW

		sections.forEach((sct, i) => {
			ScrollTrigger.create({
				trigger: sct,
				start: () =>
					'top top-=' +
					(sct.offsetLeft - window.innerWidth / 2) *
					(maxWidth / (maxWidth - window.innerWidth)),
				end: () =>
					'+=' +
					sct.offsetWidth *
					(maxWidth / (maxWidth - window.innerWidth)),
				toggleClass: { targets: sct, className: 'active' },
				// ADD SKEW
				// onUpdate: (self) => {
				// 	let skew = clamp(self.getVelocity() / -500)
				// 	// only do something if the skew is MORE severe. Remember, we're always tweening back to 0, so if the user slows their scrolling quickly, it's more natural to just let the tween handle that smoothly rather than jumping to the smaller skew.
				// 	if (Math.abs(skew) > Math.abs(proxy.skew)) {
				// 		proxy.skew = skew
				// 		gsap.to(proxy, {
				// 			skew: 0,
				// 			duration: 0.5,
				// 			ease: 'circ',
				// 			overwrite: true,
				// 			onUpdate: () => skewSetter(proxy.skew),
				// 		})
				// 	}
				// },
				// END SKEW
			})
		})

		// SKEW: make the right edge "stick" to the scroll bar. force3D: true improves performance
		// gsap.set(section, { transformOrigin: 'center center', force3D: true })
		// END SKEW
	}

	/**
	 * pin Vertical Animation
	 */
	pinVerticalAnimation(item) {
		const target = item.querySelector('[data-scroll-target]')
		const targetLeft = item.querySelector('.js-pin-vertical-container-left')
		const targetCenter = item.querySelector(
			'.js-pin-vertical-container-center'
		)
		const targetRight = item.querySelector(
			'.js-pin-vertical-container-right'
		)
		const targetScrub = parseInt(item.dataset.scrollScrub, 10)

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: target,
				start: 'center center',
				end: () => `+=${targetLeft.offsetHeight}`,
				scrub: targetScrub || false,
				pin: true,
				// anticipatePin: 1,
			},
		})
		tl.fromTo(
			targetLeft,
			{ y: 0 },
			{ y: -targetLeft.offsetHeight + item.offsetHeight },
			'step'
		)
			.fromTo(
				targetCenter,
				{ y: 0 },
				{ y: targetCenter.offsetHeight - item.offsetHeight },
				'step'
			)
			.fromTo(
				targetRight,
				{ y: 0 },
				{ y: -targetRight.offsetHeight + item.offsetHeight },
				'step'
			)
	}

	/**
	 * comparison Animation
	 */
	comparisonAnimation(item) {
		const target = item.querySelector('[data-scroll-target]')
		const targetMedia = item.querySelectorAll('.js-comparison-after-media')
		const targetImage = item.querySelectorAll(
			'.js-comparison-after-media img'
		)
		const targetScrub = parseInt(item.dataset.scrollScrub, 10)

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: target,
				start: 'center center',
				// makes the height of the scrolling (while pinning) match the width, thus the speed remains constant (vertical/horizontal)
				end: () => `+=${target.offsetWidth}`,
				scrub: targetScrub || false,
				pin: true,
				// anticipatePin: 1,
			},
			defaults: { ease: 'none' },
		})
		// animate the container one way...
		tl.fromTo(targetMedia, { xPercent: 100, x: 0 }, { xPercent: 0 })
			// ...and the image the opposite way (at the same time)
			.fromTo(targetImage, { xPercent: -100, x: 0 }, { xPercent: 0 }, 0)
	}
}
