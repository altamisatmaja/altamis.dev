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
                    controlFlowFlattening: true,
                    controlFlowFlatteningThreshold: 0.35,
                    deadCodeInjection: true,
                    deadCodeInjectionThreshold: 0.1,
                    identifierNamesGenerator: 'hexadecimal',
                    renameGlobals: false,
                    selfDefending: true,
                    splitStrings: true,
                    splitStringsChunkLength: 8,
                    stringArray: true,
                    stringArrayEncoding: ['base64'],
                    stringArrayThreshold: 0.75,
                    transformObjectKeys: true,
                    unicodeEscapeSequence: false,
                });

                output.code = result.getObfuscatedCode();
                output.map = null;
            }
        },
    };
}

export default defineConfig(({ mode }) => ({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
        svelte(),
        ...(mode === 'production' ? [obfuscateProductionBundle()] : []),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
}));
