/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.{html,js,vue,blade.php}"],
    theme: {
        extend: {
            colors: {
                'primary': {
                    DEFAULT : '#3b82f6',
                    '50': '#eff6ff',
                    '100': '#dbeafe',
                    '200': '#bfdbfe',
                    '300': '#93c5fd',
                    '400': '#60a5fa',
                    '500': '#3b82f6',
                    '600': '#2563eb',
                    '700': '#1d4ed8',
                    '800': '#1e40af',
                    '900': '#1e3a8a',
                    '950': '#172554',
                    '960': '#343333',
                    '970': '#b9b9be'
                },
                'purple': {
                    DEFAULT : '#3b82f6',
                    '50': '#eff6ff',
                    '100': '#A72693',
                    '150': '#160F30'
                },
                'green': {
                    '50': '#ffffff',
                    '100': '#dcfce7',
                    '200': '#bbf7d0',
                    '300': '#86efac',
                    '400': '#4ade80',
                    '500': '#22c55e',
                    '600': '#16a34a',
                    '700': '#15803d',
                    '800': '#166534',
                    '900': '#14532d',
                    '950': '#052e16'
                },
                'yellow': {
                    '50': '#fefce8',
                    '60': '#f5c518',
                    '100': '#fef9c3',
                    '150': 'F8DE22',
                    '200': '#fef08a',
                    '300': '#fde047',
                    '400': '#facc15',
                    '500': '#eab308',
                    '600': '#ca8a04',
                    '700': '#a16207',
                    '800': '#854d0e',
                    '900': '#713f12',
                    '950': '#422006'
                },
                'red': {
                    '50': '#fef2f2',
                    '100': '#fee2e2',
                    '200': '#fecaca',
                    '300': '#fca5a5',
                    '400': '#f87171',
                    '500': '#ef4444',
                    '600': '#dc2626',
                    '700': '#b91c1c',
                    '800': '#991b1b',
                    '900': '#7f1d1d',
                    '950': '#450a0a',
                    '1000': '#11468F'
                },
                'brown': {
                    '50': '#e0b68a',
                    '60': '#d1a374',
                    '70': '#c49869',
                    '80': '#af8050',
                    '90': '#946a3e',
                    '100': '#41280f',
                    '110': '#e3a559',
                },
            }
        }
    },
    plugins: [],
}
