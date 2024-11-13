let productCount = 0;

    function showSection(sectionId) {
        const sections = document.getElementsByClassName('content');
        for (let section of sections) {
            section.classList.remove('active');
        }
        document.getElementById(sectionId).classList.add('active');
    }

    function addProduct() {
        const nameInput = document.getElementById("nameInput").value;
        const priceInput = document.getElementById("priceInput").value;
        const quantityInput = document.getElementById("quantityInput").value;
        const categoryInput = document.querySelector('input[name="category"]:checked').value;
        const photoInput = document.getElementById("photoInput").files[0];

        if (nameInput && priceInput && quantityInput && categoryInput && photoInput) {
            const tableBody = document.getElementById("productTableBody");

            productCount++;
            const newRow = document.createElement("tr");

            const photoURL = URL.createObjectURL(photoInput);
            newRow.innerHTML = `
                <td>${productCount}</td>
                <td>${nameInput}</td>
                <td>${priceInput}</td>
                <td>${quantityInput}</td>
                <td>${categoryInput}</td>
                <td><img src="${photoURL}" alt="Ảnh sản phẩm" width="50" onclick="openModal('${photoURL}')"></td>
                <td class="action-button">
                    <span class="edit-button" onclick="editProduct(this)">✏️</span>
                    <span class="delete-button" onclick="deleteProduct(this)">🗑️</span>
                </td>
            `;

            tableBody.appendChild(newRow);
            document.getElementById("productForm").reset();
        } else {
            alert("Vui lòng nhập đủ thông tin!");
        }
    }

    function openModal(imageSrc) {
        const modal = document.getElementById("imageModal");
        const modalImage = document.getElementById("modalImage");
        modalImage.src = imageSrc;
        modal.style.display = "flex";
    }

    function closeModal() {
        const modal = document.getElementById("imageModal");
        modal.style.display = "none";
    }

    function editProduct(button) {
        const row = button.parentElement.parentElement;
        document.getElementById("nameInput").value = row.cells[1].innerText;
        document.getElementById("priceInput").value = row.cells[2].innerText;
        document.getElementById("quantityInput").value = row.cells[3].innerText;
        
        const category = row.cells[4].innerText;
        document.getElementById(`category${category}`).checked = true;

        row.remove();
        productCount--;
    }

    function deleteProduct(button) {
        const row = button.parentElement.parentElement;
        row.remove();
        productCount--;
    }

    function searchProduct() {
        const searchInput = document.getElementById("searchInput").value.toLowerCase();
        const tableRows = document.getElementById("productTableBody").getElementsByTagName("tr");

        for (let i = 0; i < tableRows.length; i++) {
            const row = tableRows[i];
            const rowText = row.innerText.toLowerCase();
            row.style.display = rowText.includes(searchInput) ? "" : "none";
        }
    }