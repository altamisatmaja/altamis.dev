import JavaScriptObfuscator from 'javascript-obfuscator';
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import { svelte } from '@sveltejs/vite-plugin-svelte';

function obfuscateProductionBundle() {
    return {
        name: 'obfuscate-production-bundle',
        generateBundle(_, bundle) {
            for (const output of Object.values(bundle)) {
                if (output.type !== 'chunk' || !output.fileName.endsWith('.js')) {
                    continue;
                }

                const result = JavaScriptObfuscator.obfuscate(output.code, {
                    compact: true,
                    identifierNamesGenerator: 'hexadecimal',
                    renameGlobals: false,
                    stringArray: true,
                    stringArrayEncoding: [],
                    stringArrayThreshold: 0.5,
                    splitStrings: false,
                    selfDefending: false,
                    controlFlowFlattening: false,
                    deadCodeInjection: false,
                    transformObjectKeys: false,
                    unicodeEscapeSequence: false,
                });

                output.code = result.getObfuscatedCode();
                output.map = null;
            }
        },
    };
}

export default defineConfig(({ mode }) => {
    const shouldObfuscate = mode === 'production';

    return {
        plugins: [
            laravel({
                input: ['resources/css/app.css', 'resources/js/app.js'],
                refresh: true,
            }),
            tailwindcss(),
            svelte(),
            ...(shouldObfuscate ? [obfuscateProductionBundle()] : []),
        ],
        server: {
            watch: {
                ignored: ['**/storage/framework/views/**'],
            },
        },
    };
});
