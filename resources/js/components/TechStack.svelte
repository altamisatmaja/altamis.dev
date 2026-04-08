<script>
    const techs = [
        {
            name: "React",
            bg: "#e8f8fe",
            img: "/storage/assets/images/techstack/react.png",
        },
        {
            name: "Next.js",
            bg: "#000000",
            img: "/storage/assets/images/techstack/nextjs.png",
        },
        {
            name: "Laravel",
            bg: "#fff0ef",
            img: "/storage/assets/images/techstack/laravel.png",
        },
        {
            name: "Docker",
            bg: "#e8f3ff",
            img: "/storage/assets/images/techstack/docker.png",
        },
        {
            name: "Flutter",
            bg: "#e8f8fe",
            img: "/storage/assets/images/techstack/flutter.png",
        },
        {
            name: "TypeScript",
            bg: "#3079C6",
            img: "/storage/assets/images/techstack/typescript.png",
        },
        {
            name: "Go",
            bg: "#e8fbf8",
            img: "/storage/assets/images/techstack/go.png",
        },
        {
            name: "MongoDB",
            bg: "#edfbf0",
            img: "/storage/assets/images/techstack/mongodb.png",
        },
        {
            name: "MySQL",
            bg: "#fff8e7",
            img: "/storage/assets/images/techstack/mysql.png",
        },
        {
            name: "PostgreSQL",
            bg: "#eef4ff",
            img: "/storage/assets/images/techstack/postgresql.png",
        },

        {
            name: "Figma",
            bg: "#f5f5f7",
            img: "/storage/assets/images/techstack/figma.png",
        },
        {
            name: "Svelte",
            bg: "#fff2ee",
            img: "/storage/assets/images/techstack/svelte.png",
        },
        {
            name: "Java",
            bg: "#fff0ef",
            img: "/storage/assets/images/techstack/java.png",
        },
        {
            name: "Kotlin",
            bg: "#f0f0ff",
            img: "/storage/assets/images/techstack/kotlin.png",
        },
        {
            name: "Kali Linux",
            bg: "#f0f0fa",
            img: "/storage/assets/images/techstack/kali.png",
        },
        {
            name: "Claude",
            bg: "#fff5f0",
            img: "/storage/assets/images/techstack/claude.png",
        },
    ];

    const row1 = techs.slice(0, 6);
    const row2 = techs.slice(6, 11);
    const row3 = techs.slice(11);
</script>

<section class="py-36 px-6 text-center" style="background: var(--page-bg);">
    <div class="max-w-3xl mx-auto">
        <h2
            class="text-5xl md:text-6xl font-bold tracking-tight mb-5"
            style="color: var(--text-primary); letter-spacing: -0.03em;"
        >
            My tech stack
        </h2>
        <p class="text-lg mb-16 max-w-md mx-auto" style="color: var(--text-secondary);">
            The tools I reach for to build fast, scalable, and elegant products.
        </p>

        <!-- Character illustration -->
        <div class="flex justify-center mb-6">
            <img
                src="/storage/assets/images/altamis-exploring-image.png"
                alt="Altamis"
                class="w-40 object-contain drop-shadow-sm"
            />
        </div>

        <!-- Icon grid -->
        <div class="grid grid-cols-4 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-3">
            {#each techs as tech}
                <div
                    class="aspect-square rounded-2xl flex items-center justify-center p-5 transition-transform hover:scale-105 hover:-translate-y-1 duration-200"
                    style="background: {tech.bg}; box-shadow: var(--shadow-soft);"
                    title={tech.name}
                >
                    <img
                        src={tech.img}
                        alt={tech.name}
                        class="w-full h-full object-contain"
                    />
                </div>
            {/each}
        </div>
    </div>
</section>
