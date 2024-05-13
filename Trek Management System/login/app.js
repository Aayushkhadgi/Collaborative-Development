
let lighticon = document.querySelector(".light");
let container = document.querySelector(".container");
let logout=document.querySelector(".logout");



const fileInput = document.getElementById('product-image');
fileInput.addEventListener('change', validateFileExtension);

function validateFileExtension() {
    const allowedExtensions = ['.jpg', '.jpeg', '.png'];
    const fileName = fileInput.value;
    const fileExtension = fileName.substring(fileName.lastIndexOf('.')).toLowerCase();

    if (!allowedExtensions.includes(fileExtension)) {
        document.getElementById('file-error').textContent = 'Invalid file format. Please choose a valid image file (JPG, JPEG, or PNG).';
        fileInput.value = ''; // Clear the input
    } else {
        document.getElementById('file-error').textContent = ''; // Clear any previous error message
    }
}


lighticon.addEventListener("click", () => {
    if (lighticon.getAttribute("name") === "moon-outline") {
        lighticon.setAttribute("name", "sunny-outline");
        document.body.classList.remove("darkmode");
        document.querySelector("header").classList.remove("navbar_active");
        
    } else {
        lighticon.setAttribute("name", "moon-outline");
        document.body.classList.add("darkmode");
        document.querySelector("header").classList.add("navbar_active");
    }
});
logout.addEventListener("click",()=>{
    window.location="http://localhost/LogIn";
})
   


let sizes=document.querySelectorAll(".product_size");
 sizes.forEach(function(size) {
        size.addEventListener("change", function() {
            add(); // Call the add function whenever a size is changed
        });
    });
    sizes.forEach(function(size) {
        size.addEventListener("input", function() {
            if (size.value === "") {
                size.value = "0";
            }
        });
    });




    function add() {
        let totalstock = document.getElementById('totalstock');
        let size_xl = parseInt(document.getElementById('size_xl').value);
        let size_xxl = parseInt(document.getElementById('size_xxl').value);
        let size_m = parseInt(document.getElementById('size_m').value);
        let size_s = parseInt(document.getElementById('size_s').value);
        totalstock.innerHTML = size_m + size_s + size_xl + size_xxl;
    }


// change in options subcategories based on category
        // Define sub-categories for each category
        const subCategories = {
            Men: ['Pant', 'Shirt/T-shirt', 'Jacket','Sweater'],
            Women: ['Jeans', 'Skirt', 'Jacket', 'Tops'],
            Unisex: ['Sweatshirt', 'Sweatpant', 'Windcheater', 'Hoodie']
            // Add more categories and their sub-categories as needed
        };

        // Get references to the Category and Sub-Category select elements
        const categorySelect = document.getElementById('Category');
        const subCategorySelect = document.getElementById('Sub-Category');

        // Function to populate Sub-Category select element based on the selected Category
        function populateSubCategories() {
            const selectedCategory = categorySelect.value;
            subCategorySelect.innerHTML = '<option value="" disabled selected>Select</option>'; // Reset Sub-Category options

            if (selectedCategory && subCategories[selectedCategory]) {
                subCategories[selectedCategory].forEach(subCategory => {
                    const option = document.createElement('option');
                    option.value = subCategory;
                    option.textContent = subCategory;
                    subCategorySelect.appendChild(option);
                });
            }
        }

        // Add event listener to Category select element
        categorySelect.addEventListener('change', populateSubCategories);



// Function to validate product description
function validateProductDescription() {
    const descriptionInput = document.getElementById('product-description');
    const description = descriptionInput.value.trim();
    const descriptionLength = description.split(/\s+/).length;

    if (descriptionLength < 50 || descriptionLength > 250) {
        document.getElementById('description-validation-message').textContent = "Product description should be between 50 and 250 words.";
        return false;
    } else {
        document.getElementById('description-validation-message').textContent = "";
        return true;
    }
}

// Function to validate product name
function validateProductName() {
    const nameInput = document.getElementById('product-name');
    const name = nameInput.value.trim();

    if (name.length > 50) {
        document.getElementById('name-validation-message').textContent = "Product name should be maximum 50 characters.";
        return false;
    } else {
        document.getElementById('name-validation-message').textContent = "";
        return true;
    }
}

// Function to validate sub-category selection
function validateSubCategory() {
    const subCategorySelect = document.getElementById('Sub-Category');
    const selectedSubCategory = subCategorySelect.value;

    if (!selectedSubCategory) {
        document.getElementById('sub-category-validation-message').textContent = "Please select a sub-category.";
        return false;
    } else {
        document.getElementById('sub-category-validation-message').textContent = "";
        return true;
    }
}

// Add event listeners for input validation
document.getElementById('product-description').addEventListener('input', validateProductDescription);
document.getElementById('product-name').addEventListener('input', validateProductName);
document.getElementById('Sub-Category').addEventListener('change', validateSubCategory);