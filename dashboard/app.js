document.addEventListener("DOMContentLoaded", () => {
    const mainContent = document.getElementById("main-content");
    const links = document.querySelectorAll("a[data-page]");
    const loadedScripts = new Set();
    const commonScript = "../assets/js/deshboardA.js";
    const qrScript = "https://unpkg.com/html5-qrcode";

    loadScript(commonScript);

    links.forEach(link => {
        link.addEventListener("click", e => {
            e.preventDefault();
            links.forEach(link => link.classList.remove("bg-white/10"));
            document.querySelector("#sidebar").classList.toggle('-translate-x-full');

            link.classList.add("bg-white/10");
            const page = link.getAttribute("data-page");
            document.getElementById("pageTitle").textContent = page;

            history.pushState({ page }, "", `?page=${page}`);

            loadPage(page);
        });
    });

    function loadPage(page) {
        fetch(`pages/${page}.php`)
            .then(res => res.text())
            .then(html => {
                mainContent.innerHTML = html;

                const scriptPath = `../assets/js/${page}.js`;
                loadScript(scriptPath);

                if (page === "scan") {
                    ensureQrScript(() => {
                        if (typeof initQrScanner === "function") {
                            initQrScanner();
                        }
                    });
                }
            })
            .catch(() => {
                mainContent.innerHTML = `<h2 class="text-red-500">Page not found</h2>`;
            });
    }

    function loadScript(src, callback) {
     
        const script = document.createElement("script");
        script.src = src;
        script.defer = true;
        script.onload = () => {
            loadedScripts.add(src);
            if (callback) callback();
        };
        document.body.appendChild(script);
    }

    function ensureQrScript(callback) {
        if (typeof Html5Qrcode !== "undefined") {
            if (callback) callback();
        } else {
            loadScript(qrScript, callback);
        }
    }

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
