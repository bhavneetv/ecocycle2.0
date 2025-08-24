document.addEventListener("DOMContentLoaded", () => {
    const mainContent = document.getElementById("main-content");
    const links = document.querySelectorAll("a[data-page]");
    const loadedScripts = new Set(); // ✅ Track loaded scripts

    // Handle menu clicks
    links.forEach(link => {
        link.addEventListener("click", e => {
            e.preventDefault();
            links.forEach(link => link.classList.remove("bg-white/10"));
            document.querySelector("#sidebar").classList.toggle('-translate-x-full');

            link.classList.add("bg-white/10");
            const page = link.getAttribute("data-page");
            document.getElementById("pageTitle").textContent = page;

            // Update URL without reloading
            history.pushState({ page }, "", `?page=${page}`);

            // Load new content
            loadPage(page);
        });
    });

    // Function to load page content dynamically
    function loadPage(page) {
        fetch(`pages/${page}.php`)
            .then(res => res.text())
            .then(html => {
                mainContent.innerHTML = html;

                // ✅ Load page-specific JS file dynamically if not already loaded
                const scriptPath = `../assets/js/${page}.js`;
                if (!loadedScripts.has(scriptPath)) {
                    fetch(scriptPath, { method: "HEAD" }) // check if file exists
                        .then(res => {
                            if (res.ok) {
                                const script = document.createElement("script");
                                script.src = scriptPath;
                                script.defer = true;
                                document.body.appendChild(script);
                                loadedScripts.add(scriptPath);
                            }
                        })
                        .catch(() => {
                            // No script file for this page → ignore
                        });
                }
            })
            .catch(() => {
                mainContent.innerHTML = `<h2 class="text-red-500">Page not found</h2>`;
            });
    }

    // Handle back/forward buttons
    window.addEventListener("popstate", () => {
        const params = new URLSearchParams(window.location.search);
        const page = params.get("page") || "dashboard";
        loadPage(page);
        document.getElementById("pageTitle").textContent = page;
        links.forEach(link => {
            if (link.getAttribute("data-page") === page) {
                link.classList.add("bg-white/10");
            }
        });
    });

    // Load page on refresh
    const params = new URLSearchParams(window.location.search);
    const currentPage = params.get("page") || "dashboard";
    loadPage(currentPage);
    document.getElementById("pageTitle").textContent = currentPage;
    links.forEach(link => {
        if (link.getAttribute("data-page") === currentPage) {
            link.classList.add("bg-white/10");
        }
    });
});
