document
    .querySelector(".hamburger")
    .addEventListener("click", function toggleSidebar() {
        document
            .querySelector(".profile__sidebar")
            .classList.toggle("hidden-sidebar");
    });

document
    .querySelector("#import-new-file")
    .addEventListener("click", function showImportFileBox() {
        document
            .querySelector(".import-file__box")
            .classList.remove("display-none");
    });

document
    .querySelector("#exit-cross")
    .addEventListener("click", function hideImportFileBox(event) {
        event.stopPropagation();
        document
            .querySelector(".import-file__box")
            .classList.add("display-none");
    });

document
    .querySelector("#new-note")
    .addEventListener("click", function showNewNoteBox() {
        document
            .querySelector(".new-note__box")
            .classList.remove("display-none");
    });

document
    .querySelector("#exit-cross2")
    .addEventListener("click", function hideNewNoteBox(event) {
        event.stopPropagation();
        document.querySelector(".new-note__box").classList.add("display-none");
    });

document
    .querySelector("#file")
    .addEventListener("change", function updateFileName() {
        let fileName = this.files[0] ? this.files[0].name : "No file selected";
        document.querySelector("#fileName").textContent = fileName;
    });

document.forms["import"].addEventListener(
    "submit",
    function handleSubmit(event) {
        event.preventDefault();
        let formData = new FormData(this);

        fetch("/upload-file", {
            method: "POST",
            body: formData,
            headers: {
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]')
                    .value,
            },
        })
            .then((response) => response.json())
            .then((data) => {
                fetch("/library").then(onResponse).then(onJson);
            });

        document
            .querySelector(".import-file__box")
            .classList.add("display-none");
    }
);

function deleteFile(fileId) {
    fetch(`/delete-file/${fileId}`, {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
    })
        .then((response) => response.json())
        .then((data) => {
            loadLibrary();
            loadFavourites();
        });
}

function onJson(json) {
    const libraryBox = document.querySelector(".library");
    libraryBox.innerHTML = "";

    json.forEach((file) => {
        const fav = document.createElement("img");
        const fileBox = document.createElement("div");
        const fileName = document.createElement("a");
        const trashBin = document.createElement("img");

        fileBox.setAttribute("data-id", file.id);
        fileBox.classList.add("file-box");

        fileName.innerHTML = file.file_name;
        fileName.href = `/open-file/${file.id}`;
        fileName.target = "_blank";
        fileName.classList.add("file-row");

        fav.classList.add("fav-img");
        fetch(`/is-favourite/${file.id}`)
            .then(onResponse)
            .then((json) => {
                if (json.favourite) {
                    fav.src = "images/profile/fav-filled.svg";
                    fav.addEventListener("click", function removeFavourite() {
                        fetch(`/delete-favourite/${file.id}`, {
                            method: "DELETE",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document
                                    .querySelector('meta[name="csrf-token"]')
                                    .getAttribute("content"),
                            },
                        })
                            .then(onResponse)
                            .then((data) => {
                                loadLibrary();
                                loadFavourites();
                            });
                    });
                } else {
                    fav.src = "images/profile/fav-empty.svg";
                    fav.addEventListener("click", function addFavourite() {
                        fetch(`/favourite/${file.id}`)
                            .then(onResponse)
                            .then((data) => {
                                loadLibrary();
                                loadFavourites();
                            });
                    });
                }
            });

        trashBin.src = "images/profile/rubbish-bin-svgrepo-com (1).svg";
        trashBin.classList.add("trash-bin");
        trashBin.addEventListener("click", function () {
            deleteFile(file.id);
        });

        fileBox.appendChild(fileName);
        fileBox.appendChild(fav);
        fileBox.appendChild(trashBin);
        libraryBox.appendChild(fileBox);
    });
}

function onResponse(response) {
    return response.json();
}

function loadLibrary() {
    fetch("/library").then(onResponse).then(onJson);
}

document
    .querySelector("#search-your-library")
    .addEventListener("input", function searchLibrary() {
        let content = document.querySelector("#search-your-library").value;
        if (content) {
            fetch(`/search-files/${encodeURIComponent(content)}`)
                .then(onResponse)
                .then(onJson);
        }
    });

document
    .querySelector("#profile-settings")
    .addEventListener("click", function toggleProfileManagement() {
        document
            .querySelector(".profile-managment")
            .classList.toggle("display-slide-in");
    });

function onFavouriteJson(json) {
    const libraryBox = document.querySelector(".profile__sidebar--preferiti");
    libraryBox.innerHTML = "";
    json.forEach((file) => {
        
        const fileBox = document.createElement("div");
        const fileName = document.createElement("a");

        libraryBox.appendChild(fileBox);
        fileBox.classList.add("file-box");

        fileName.innerHTML = file.file_name;
        fileName.href = `/open-file/${file.file_id}`;
        fileName.target = "_blank";
        fileName.classList.add("file-row");

        fileBox.appendChild(fileName);
        libraryBox.appendChild(fileBox);
    });
}

function loadFavourites() {
    fetch("/favourites-library").then(onResponse).then(onFavouriteJson);
}

loadLibrary();
loadFavourites();
