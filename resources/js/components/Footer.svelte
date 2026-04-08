<footer style="background: var(--page-bg);">
    <!-- Let's Connect -->
    <div
        class="px-6 pt-28 pb-16 text-center"
        style="background: var(--page-bg);"
    >
        <div class="max-w-3xl mx-auto">
            <p
                class="text-xs font-semibold tracking-widest uppercase mb-4"
                style="color: var(--text-tertiary);"
            >
                Get In Touch
            </p>
            <h2
                class="text-5xl md:text-6xl font-bold tracking-tight mb-8"
                style="color: var(--text-primary); letter-spacing: -0.03em;"
            >
                Let's Connect
            </h2>
            <a
                href="mailto:hello@altamis.dev"
                class="inline-block text-white text-base font-semibold px-8 py-3.5 rounded-full transition-opacity hover:opacity-85 mb-12"
                style="background: var(--accent-strong); color: var(--text-contrast);"
            >
                Start Project
            </a>

            <!-- Contact cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-left">
                <div
                    class="rounded-2xl p-6"
                    style="background: var(--surface-2); box-shadow: var(--shadow-soft);"
                >
                    <p
                        class="text-sm mb-2"
                        style="color: var(--text-secondary);"
                    >
                        Connect
                    </p>
                    <a
                        href="https://linkedin.com/in/altamisatmaja"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-lg font-semibold transition-opacity hover:opacity-50"
                        style="color: var(--text-primary);">LinkedIn</a
                    >
                </div>
                <div
                    class="rounded-2xl p-6"
                    style="background: var(--surface-2); box-shadow: var(--shadow-soft);"
                >
                    <p
                        class="text-sm mb-2"
                        style="color: var(--text-secondary);"
                    >
                        Collaborations
                    </p>
                    <a
                        href="mailto:collab@altamis.dev"
                        class="text-lg font-semibold transition-opacity hover:opacity-60"
                        style="color: var(--text-primary);"
                    >
                        altamisatmaja@gmail.com
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer grid -->
    <div class="px-6 pt-8 pb-40">
        <div class="max-w-3xl mx-auto">
            <div class="grid grid-cols-4 gap-4 mb-0">
                <!-- Brand card -->
                <div
                    class="col-span-4 md:col-span-1 rounded-3xl p-6 flex flex-col justify-between overflow-hidden relative"
                    style="min-height: 260px; background: var(--surface-2); box-shadow: var(--shadow-soft);"
                >
                    <div>
                        <p
                            class="text-base font-bold"
                            style="color: var(--text-primary);"
                        >
                            Hi, I'm <span class="brand-wordmark">Altamis</span>.
                        </p>
                        <p
                            class="text-sm mt-1"
                            style="color: var(--text-secondary);"
                        >
                            I build fast and elegant web experiences
                        </p>
                    </div>
                    <div
                        class="absolute bottom-0 left-1/2 -translate-x-1/2 w-36 pointer-events-none"
                    >
                        <img
                            src="/storage/assets/images/altamis-footer.png"
                            alt="Altamis"
                            class="w-full object-contain"
                        />
                    </div>
                </div>

                <!-- Nav columns -->
                <div
                    class="col-span-4 md:col-span-3 rounded-3xl p-6 flex flex-col justify-between"
                    style="background: var(--surface-2); box-shadow: var(--shadow-soft);"
                >
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Menu -->
                        <div>
                            <p
                                class="text-xs font-semibold tracking-widest uppercase mb-5"
                                style="color: var(--text-tertiary);"
                            >
                                Menu
                            </p>
                            <ul class="flex flex-col gap-3">
                                <li>
                                    <a
                                        href="#home"
                                        class="text-lg font-semibold transition-opacity hover:opacity-50"
                                        style="color: var(--text-primary);"
                                        >Home</a
                                    >
                                </li>
                                <li>
                                    <a
                                        href="#works"
                                        class="text-lg font-semibold transition-opacity hover:opacity-50"
                                        style="color: var(--text-primary);"
                                        >Works</a
                                    >
                                </li>
                                <li>
                                    <a
                                        href="#about"
                                        class="text-lg font-semibold transition-opacity hover:opacity-50"
                                        style="color: var(--text-primary);"
                                        >About</a
                                    >
                                </li>
                            </ul>
                        </div>

                        <!-- Follow -->
                        <div>
                            <p
                                class="text-xs font-semibold tracking-widest uppercase mb-5"
                                style="color: var(--text-tertiary);"
                            >
                                Follow
                            </p>
                            <ul class="flex flex-col gap-3">
                                <li>
                                    <a
                                        href="https://github.com/altamisatmaja"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="text-lg font-semibold transition-opacity hover:opacity-50"
                                        style="color: var(--text-primary);"
                                        >GitHub</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Bottom bar -->
                    <div
                        class="flex items-center justify-between mt-8 pt-6"
                        style="border-top: 1px solid var(--line-soft);"
                    >
                        <p class="text-sm" style="color: var(--text-tertiary);">
                            © 2025, <span class="brand-wordmark">Altamis</span
                            >.
                        </p>
                        <button
                            on:click={() =>
                                window.scrollTo({ top: 0, behavior: "smooth" })}
                            class="text-sm font-medium transition-opacity hover:opacity-50"
                            style="color: var(--text-secondary);"
                        >
                            Back to Top
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
