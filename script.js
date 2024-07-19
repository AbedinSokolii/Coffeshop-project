let navbar = document.querySelector(".navbar");

document.querySelector("#menu-btn").onclick = () => {
  navbar.classList.toggle("active");
  searchForm.classList.remove("active");
  cartItem.classList.remove("active");
};

let searchForm = document.querySelector(".search-form");

document.querySelector("#search-btn").onclick = () => {
  searchForm.classList.toggle("active");
  navbar.classList.remove("active");
  cartItem.classList.remove("active");
};

let cartItem = document.querySelector(".cart-items-container");

document.querySelector("#cart-btn").onclick = () => {
  cartItem.classList.toggle("active");
  navbar.classList.remove("active");
  searchForm.classList.remove("active");
};

window.onscroll = () => {
  navbar.classList.remove("active");
  /*searchForm.classList.remove("active");*/
  cartItem.classList.remove("active");
};

const cartItemsContainer = document.querySelector(".cart-items-container");
const removeButtons = cartItemsContainer.querySelectorAll(".fas.fa-times");

function updateCartContainerVisibility() {
  const cartItems = cartItemsContainer.querySelectorAll(".cart-item");

  if (cartItems.length === 0) {
    cartItemsContainer.classList.remove("active");
    alert("Your cart is empty. Please add an item.");
  } else {
    cartItemsContainer.classList.add("active");
  }
}

removeButtons.forEach((button) => {
  button.addEventListener("click", () => {
    button.parentElement.remove();
    updateCartContainerVisibility();
  });
});

const element = document.querySelector(".cart-items-container");

function addHTML(NameofProduct,htmlCode , price) {
  if (htmlCode) {
    const existingItem = element.querySelector(
      '.cart-item[data-html-code="' + htmlCode + '"]'
    );

    if (existingItem) {
      alert("You can only add 1 item to the cart");
      return;
    }

    var newDiv = document.createElement("div");
    var addItem =
      '<span class="fas fa-times remove-item"> </span><img src="images/' +
      htmlCode +'.jpg" alt=""> <div class="content"> <h3>'+NameofProduct +'</h3> <div class="price"> $'
      +price +' </div></div>';
    newDiv.classList = "cart-item";
    newDiv.setAttribute("data-html-code", htmlCode);
    newDiv.innerHTML = addItem;

    element.prepend(newDiv);

    var removeButton = newDiv.querySelector(".remove-item");
    removeButton.addEventListener("click", function () {
      newDiv.remove();
      updateCartContainerVisibility();
    });

    updateCartContainerVisibility();
  } else {
    console.error("Element with ID " + htmlCode + " not found");
  }
}

document.addEventListener("DOMContentLoaded", function () {
  const searchBox = document.getElementById("search-box");
  const menuSection = document.getElementById("menu");
  const menuItems = document.querySelectorAll(".box");

  searchBox.addEventListener("input", function () {
    const searchTerm = searchBox.value.toLowerCase().trim();

    menuItems.forEach((item) => {
      const itemName = item.querySelector("h3").textContent.toLowerCase();

      // Check if the item name includes the search term
      if (itemName.includes(searchTerm)) {
        item.style.display = "block";
      } else {
        item.style.display = "none";
      }
    });

    // Scroll immediately to the menu section when typing in the search bar
    menuSection.scrollIntoView({ behavior: "auto" });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  // Get references to the search-related elements and other sections
  var searchInput = document.getElementById("search-box");
  var menuSection = document.getElementById("menu");
  var otherSections = document.querySelectorAll("section:not(#menu)");

  // Function to toggle the visibility of sections based on search input
  function toggleSections() {
    if (searchInput.value.trim() !== "") {
      // If there is text in the search bar, hide all sections except for the menu
      hideSections();
    } else {
      // If the search bar is empty, show all sections
      showSections();
    }
  }

  // Attach the toggleSections function to the input event of the search bar
  searchInput.addEventListener("input", toggleSections);

  // Function to show all sections
  function showSections() {
    menuSection.style.display = ""; // Show the menu
    // Show other sections
    otherSections.forEach(function (section) {
      section.style.display = "";
    });
  }

  // Function to hide all sections except for the menu
  function hideSections() {
    menuSection.style.display = ""; // Show the menu
    // Hide other sections
    otherSections.forEach(function (section) {
      section.style.display = "none";
    });
  }

  // Function to show everything when the search bar is cleared or the search button is clicked
  function showEverything() {
    showSections();

    // Clear the search bar
    searchInput.value = "";
  }

  // Get reference to the search button

  var searchBtn = document.getElementById("search-btn");

  // Attach the showEverything function to the click event of the search button
  searchBtn.addEventListener("click", showEverything);
});


// ---------------------------------------------  Login ---------------------------------------------------------------------
function validateLogin(username, password) {
  const usernameRegex = /^.{8,13}$/;
  const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@_])[A-Za-z\d@_]{8,13}$/;

  const isUsernameValid = usernameRegex.test(username);
  const isPasswordValid = passwordRegex.test(password);

  return isUsernameValid && isPasswordValid;
}
// --------------------------------------------- Validation here ---------------------------------------------------------------------

// Get references to the login and registration forms
let signinForm = document.querySelector("#signinForm");
let signupForm = document.querySelector("#signupForm");

// Add event listener for the login form submission
signinForm.addEventListener("submit", function (event) {
  // Prevent the default form submission to handle validation
  event.preventDefault();

  // Get values from the login form inputs
  let username = signinForm.querySelector('input[name="username"]').value;
  let password = signinForm.querySelector('input[name="password"]').value;

  // Validate login inputs
  if (validateLogin(username, password)) {
    // If validation passes, submit the form
    signinForm.submit();
  } else {
    alert("Invalid username or password. Please try again.");
  }
});

// Add event listener for the registration form submission
signupForm.addEventListener("submit", function (event) {
  // Prevent the default form submission to handle validation
  event.preventDefault();

  // Get values from the registration form inputs
  let newUsername = signupForm.querySelector('input[name="username"]').value;
  let email = signupForm.querySelector('input[name="email"]').value;
  let newPassword = signupForm.querySelector('input[name="password"]').value;
  let confirmPassword = signupForm.querySelector("input#password").value;

  // Validate registration inputs
  if (validateRegistration(newUsername, email, newPassword, confirmPassword)) {
    // If validation passes, submit the form
    signupForm.submit();
  } else {
    alert("Invalid registration details. Please check your inputs.");
  }
});
