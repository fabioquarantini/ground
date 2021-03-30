module.exports = {
	purge: {
		enabled: process.env.NODE_ENV === 'production' ? true : false,
		content: ['./**/*.{html,php,js}'],
		options: {
			safelist: ['aspect-w-16', 'aspect-h-9', 'aspect-w-4', 'aspect-h-3'],
		},
	},
	darkMode: false, // or 'media' or 'class'
	theme: {
		container: {
			center: true,
			padding: '1.5rem',
		},
		extend: {
			colors: {
				primary: {
					50: 'var(--color-primary)',
					100: 'var(--color-primary)',
					200: 'var(--color-primary)',
					300: 'var(--color-primary)',
					400: 'var(--color-primary)',
					DEFAULT: 'var(--color-primary)',
					600: 'var(--color-primary)',
					700: 'var(--color-primary)',
					800: 'var(--color-primary)',
					900: 'var(--color-primary)',
				},
				secondary: 'var(--color-secondary)',
			},
			fontFamily: {
				primary: [
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
					'"Noto Color Emoji"',
				],
				secondary: [
					'ui-serif',
					'Georgia',
					'Cambria',
					'"Times New Roman"',
					'Times',
					'serif',
				],
			},
			keyframes: {
				'fade-in': {
					from: { opacity: 0 },
					to: { opacity: 1 },
				},
				'fade-in-up': {
					from: { opacity: 0, transform: 'translate3d(0, 100%, 0)' },
					to: { opacity: 1, transform: 'none' },
				},
				'fade-in-down': {
					from: { opacity: 0, transform: 'translate3d(0, -100%, 0)' },
					to: { opacity: 1, transform: 'none' },
				},
				'fade-in-left': {
					from: { opacity: 0, transform: 'translate3d(100%, 0, 0)' },
					to: { opacity: 1, transform: 'none' },
				},
				'fade-in-right': {
					from: { opacity: 0, transform: 'translate3d(-100%, 0, 0)' },
					to: { opacity: 1, transform: 'none' },
				},
				'fade-out': {
					from: { opacity: 1 },
					to: { opacity: 0 },
				},
				'fade-out-up': {
					from: { opacity: 1 },
					to: { opacity: 0, transform: 'translate3d(0, -100%, 0)' },
				},
				'fade-out-down': {
					from: { opacity: 1 },
					to: { opacity: 0, transform: 'translate3d(0, 100%, 0)' },
				},
				'scale-in': {
					from: { opacity: 0, transform: 'scale(0)' },
					to: { opacity: 1, transform: 'scale(1)' },
				},
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
				'scale-in': 'scale-in 0.5s ease-in-out forwards',
			},
		},
	},
	variants: {
		extend: {},
	},
	plugins: [
		require('@tailwindcss/aspect-ratio'),
		require('@tailwindcss/line-clamp'),
		require('@tailwindcss/forms'),
		require('@tailwindcss/typography'),
		require('tailwindcss-debug-screens'),
	],
}
