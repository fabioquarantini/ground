module.exports = {
	// mode: 'jit',
	purge: {
		enabled: process.env.NODE_ENV === 'production' ? true : false,
		// mode: 'all',
		content: ['./**/*.{html,php,js}'],
		options: {
			safelist: ['aspect-w-16', 'aspect-h-9', 'aspect-w-4', 'aspect-h-3']
		}
	},
	darkMode: 'class', // or 'media' or 'class'
	theme: {
		container: {
			center: true,
			padding: '1.5rem',
			screens: {
				xl: '1440px'
			}
		},
		extend: {
			typography: () => ({
				DEFAULT: {
					css: {
						maxWidth: '100%'
					}
				}
			}),
			colors: {
				primary: 'var(--ground-color-primary)',
				secondary: 'var(--ground-color-secondary)'
			},
			margin: {
				'1/2': '50%'
			},
			width: {
				sidebar: '650px'
			},
			fontFamily: {
				primary: [
					'var(--ground-font-primary)',
					'ui-sans-serif',
					'system-ui',
					'-apple-system',
					'BlinkMacSystemFont',
					'"Segoe UI"',
					'Roboto',
					'"Helvetica Neue"',
					'Arial',
					'"Noto Sans"',
					'sans-serif',
					'"Apple Color Emoji"',
					'"Segoe UI Emoji"',
					'"Segoe UI Symbol"',
					'"Noto Color Emoji"'
				],
				secondary: [
					'var(--ground-font-secondary)',
					'ui-serif',
					'Georgia',
					'Cambria',
					'"Times New Roman"',
					'Times',
					'serif'
				]
			},
			transitionDelay: {
				400: '400ms',
				600: '600ms',
				800: '800ms',
				900: '900ms'
			},
			transitionTimingFunction: {
				'in-expo': 'cubic-bezier(0.95, 0.05, 0.795, 0.035)',
				'in-power2': 'cubic-bezier(0.55, 0.055, 0.675, 0.19)',
				'in-power3': 'cubic-bezier(0.895, 0.03, 0.685, 0.22)',
				'in-power4': 'cubic-bezier(0.755, 0.05, 0.855, 0.06)',
				'in-back': 'cubic-bezier(0.36, 0, 0.66, -0.56)',
				'out-expo': 'cubic-bezier(0.19, 1, 0.22, 1)',
				'out-power2': 'cubic-bezier(0.215, 0.61, 0.355, 1)',
				'out-power3': 'cubic-bezier(0.165, 0.84, 0.44, 1)',
				'out-power4': 'cubic-bezier(0.23, 1, 0.32, 1)',
				'out-back': 'cubic-bezier(0.34, 1.56, 0.64, 1)',
				'in-out-expo': 'cubic-bezier(1, 0, 0, 1)',
				'in-out-power2': '0.645, 0.045, 0.355, 1)',
				'in-out-power3': 'cubic-bezier(0.77, 0, 0.175, 1)',
				'in-out-power4': 'cubic-bezier(0.86, 0, 0.07, 1)',
				'in-out-back': 'cubic-bezier(0.68, -0.6, 0.32, 1.6)'
			},
			keyframes: {
				'fade-in': {
					from: { opacity: 0 },
					to: { opacity: 1 }
				},
				'fade-in-up': {
					from: { opacity: 0, transform: 'translate3d(0, 100%, 0)' },
					to: { opacity: 1, transform: 'none' }
				},
				'fade-in-down': {
					from: { opacity: 0, transform: 'translate3d(0, -100%, 0)' },
					to: { opacity: 1, transform: 'none' }
				},
				'fade-in-left': {
					from: { opacity: 0, transform: 'translate3d(100%, 0, 0)' },
					to: { opacity: 1, transform: 'none' }
				},
				'fade-in-right': {
					from: { opacity: 0, transform: 'translate3d(-100%, 0, 0)' },
					to: { opacity: 1, transform: 'none' }
				},
				'fade-out': {
					from: { opacity: 1 },
					to: { opacity: 0 }
				},
				'fade-out-up': {
					from: { opacity: 1 },
					to: { opacity: 0, transform: 'translate3d(0, -100%, 0)' }
				},
				'fade-out-down': {
					from: { opacity: 1 },
					to: { opacity: 0, transform: 'translate3d(0, 100%, 0)' }
				},
				'scale-in': {
					from: { opacity: 0, transform: 'scale(0)' },
					to: { opacity: 1, transform: 'scale(1)' }
				}
			},
			animation: {
				'fade-in': 'fade-in 0.5s ease-in-out forwards',
				'fade-in-up': 'fade-in-up 0.5s ease-in-out forwards',
				'fade-in-down': 'fade-in-down 0.5s ease-in-out forwards',
				'fade-in-left': 'fade-in-left 0.5s ease-in-out forwards',
				'fade-in-right': 'fade-in-right 0.5s ease-in-out forwards',
				'fade-out': 'fade-out 0.5s ease-in-out forwards',
				'fade-out-up': 'fade-out-up 0.5s ease-in-out forwards',
				'fade-out-down': 'fade-out-down 0.5s ease-in-out forwards',
				'scale-in': 'scale-in 0.5s ease-in-out forwards'
			}
		}
	},
	variants: {
		extend: {}
	},
	plugins: [
		require('@tailwindcss/aspect-ratio'),
		require('@tailwindcss/line-clamp'),
		require('@tailwindcss/forms'),
		require('@tailwindcss/typography'),
		require('tailwindcss-debug-screens')
	]
};
