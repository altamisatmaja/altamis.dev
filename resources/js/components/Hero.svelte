<script>
    const row1 = [
        { emoji: "📱", label: "10+ Live Apps", tone: "green" },
        { emoji: "🖥️", label: "35+ Websites", tone: "gray" },
        { emoji: "💼", label: "50+ Projects", tone: "red" },
        { emoji: "🤙", label: "40+ Clients", tone: "yellow" },
        { emoji: "🕐", label: "4+ Years in Dev", tone: "gray" },
    ];

    const row2 = [
        { emoji: "📚", label: "API Builder", tone: "green" },
        { emoji: "📌", label: "Golang Expert", tone: "pink" },
        { emoji: "👌", label: "Pixel Perfect", tone: "yellow" },
        { emoji: "🦄", label: "Full Stack Developer", tone: "purple" },
        { emoji: "✏️", label: "UX Focused", tone: "indigo" },
    ];
</script>

<section
    id="home"
    class="min-h-screen pt-16 pb-32 flex flex-col items-center justify-center overflow-hidden"
    style="background: var(--page-bg);"
>
    <!-- Avatar -->
    <div class="mb-10">
        <div class="max-w-3xl mx-auto px-6">
            <img
                src="/storage/assets/images/altamis-hero-Image.png"
                alt="Altamis software engineer and full-stack developer illustration"
                class="w-48 h-48 object-contain mx-auto"
                fetchpriority="high"
                decoding="async"
            />
        </div>

        <!-- Headline -->
        <h1
            class="text-5xl md:text-7xl font-bold mb-5 text-center tracking-tight max-w-3xl px-6"
            style="color: var(--text-primary);"
        >
            <span class="brand-wordmark">Altamis Atmaja</span>, Software Engineer.
        </h1>
        <p
            class="max-w-3xl mx-auto text-center text-lg md:text-xl font-medium px-6 mb-10"
            style="color: var(--text-secondary);"
        >
            I build fast websites, mobile apps, and backend systems for startups
            and businesses. Open to remote collaborations across Indonesia,
            including East Java.
        </p>
        <div class="text-center mb-20">
            <div class="flex items-center justify-center gap-2 flex-wrap mb-3">
                <span
                    class="text-2xl md:text-3xl font-medium"
                    style="color: var(--text-secondary);">I press</span
                >
                <kbd class="key">⌘</kbd>
                <span
                    class="text-xl font-light"
                    style="color: var(--text-secondary);">+</span
                >
                <kbd class="key">C</kbd>
                <span
                    class="text-2xl md:text-3xl font-medium"
                    style="color: var(--text-secondary);">then</span
                >
                <kbd class="key">⌘</kbd>
                <span
                    class="text-xl font-light"
                    style="color: var(--text-secondary);">+</span
                >
                <kbd class="key">V</kbd>
            </div>
            <p
                class="text-2xl md:text-3xl font-medium"
                style="color: var(--text-secondary);"
            >
                and magic happen
            </p>
        </div>
    </div>

    <!-- Scrolling rows -->
    <div class="w-full flex flex-col gap-5 select-none">
        <!-- Row 1 — scrolls left -->
        <div class="relative w-full overflow-hidden">
            <div class="flex gap-5 animate-scroll-left w-max">
                {#each [...row1, ...row1, ...row1] as tag}
                    <span
                        class="inline-flex items-center gap-3 px-4 py-2 rounded-full text-3xl font-semibold whitespace-nowrap hero-tag"
                        data-tone={tag.tone}
                    >
                        <span class="text-2xl">{tag.emoji}</span>
                        <span>{tag.label}</span>
                    </span>
                {/each}
            </div>
            <!-- Fade edges -->
            <!-- <div class="pointer-events-none absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-[#f7f7f5] to-transparent"></div>
      <div class="pointer-events-none absolute inset-y-0 right-0 w-32 bg-gradient-to-l from-[#f7f7f5] to-transparent"></div> -->
        </div>

        <!-- Row 2 — scrolls right -->
        <div class="relative w-full overflow-hidden">
            <div class="flex gap-5 animate-scroll-right w-max">
                {#each [...row2, ...row2, ...row2] as tag}
                    <span
                        class="inline-flex items-center gap-3 px-4 py-2 rounded-full text-3xl font-semibold whitespace-nowrap hero-tag"
                        data-tone={tag.tone}
                    >
                        <span class="text-2xl">{tag.emoji}</span>
                        <span>{tag.label}</span>
                    </span>
                {/each}
            </div>
            <!-- <div class="pointer-events-none absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-[#f7f7f5] to-transparent"></div>
      <div class="pointer-events-none absolute inset-y-0 right-0 w-32 bg-gradient-to-l from-[#f7f7f5] to-transparent"></div> -->
        </div>
    </div>
</section>

<style>
    .key {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 56px;
        padding: 10px 18px;
        background: linear-gradient(
            to bottom,
            var(--hero-key-top) 0%,
            var(--hero-key-bottom) 100%
        );
        border: 1px solid var(--hero-key-border);
        border-radius: 12px;
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.9),
            0 5px 0 var(--hero-key-shadow),
            0 6px 5px rgba(0, 0, 0, 0.12);
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--text-primary);
        font-family: -apple-system, BlinkMacSystemFont, "SF Pro Display",
            sans-serif;
        line-height: 1;
        user-select: none;
    }

    @keyframes scroll-left {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-33.333%);
        }
    }
    @keyframes scroll-right {
        0% {
            transform: translateX(-33.333%);
        }
        100% {
            transform: translateX(0);
        }
    }
    .animate-scroll-left {
        animation: scroll-left 22s linear infinite;
    }
    .animate-scroll-right {
        animation: scroll-right 22s linear infinite;
    }

    .hero-tag {
        color: var(--hero-chip-text, var(--text-primary));
        background: var(--hero-chip-bg, var(--surface-2));
        border: 1px solid var(--hero-chip-border);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.14);
    }

    .hero-tag[data-tone="green"] {
        --hero-chip-bg: var(--hero-chip-green-bg);
        --hero-chip-text: var(--hero-chip-green-text);
    }

    .hero-tag[data-tone="gray"] {
        --hero-chip-bg: var(--hero-chip-gray-bg);
        --hero-chip-text: var(--hero-chip-gray-text);
    }

    .hero-tag[data-tone="red"] {
        --hero-chip-bg: var(--hero-chip-red-bg);
        --hero-chip-text: var(--hero-chip-red-text);
    }

    .hero-tag[data-tone="yellow"] {
        --hero-chip-bg: var(--hero-chip-yellow-bg);
        --hero-chip-text: var(--hero-chip-yellow-text);
    }

    .hero-tag[data-tone="pink"] {
        --hero-chip-bg: var(--hero-chip-pink-bg);
        --hero-chip-text: var(--hero-chip-pink-text);
    }

    .hero-tag[data-tone="purple"] {
        --hero-chip-bg: var(--hero-chip-purple-bg);
        --hero-chip-text: var(--hero-chip-purple-text);
    }

    .hero-tag[data-tone="indigo"] {
        --hero-chip-bg: var(--hero-chip-indigo-bg);
        --hero-chip-text: var(--hero-chip-indigo-text);
    }
</style>
