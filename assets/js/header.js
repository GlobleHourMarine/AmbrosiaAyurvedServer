// ========================================
// HEADER CORE FUNCTIONALITY
// ========================================


// Global Variables and Utilities

// Prevent multiple initializations

if (window.headerInitialized) {
   return;
}
window.headerInitialized = true;

const HeaderUtils = {
   removeGoogleBanner: function () {
      setTimeout(function () {
         document.querySelectorAll(".goog-te-banner-frame").forEach((el) => el.remove());
         document.querySelectorAll("iframe").forEach((el) => {
            if (el.src.includes("translate.google")) el.remove();
         });
      }, 500);
   },

   showToast: function (message) {
      const toast = $('<div class="toast-message"></div>').text(message);
      $('#toastContainer').append(toast);
      setTimeout(() => {
         toast.fadeOut(500, function () {
            $(this).remove();
         });
      }, 3000);
   },

   // Language persistence utilities
   saveLanguage: function (lang) {
      document.cookie = `googtrans=/en/${lang}; path=/; max-age=31536000`; // 1 year
      document.cookie = `googtrans_domain=.${window.location.hostname}; path=/; max-age=31536000`;
   },

   getCurrentLanguage: function () {
      const cookies = document.cookie.split(';');
      for (let cookie of cookies) {
         const [name, value] = cookie.trim().split('=');
         if (name === 'googtrans') {
            return value ? value.split('/')[2] : 'en';
         }
      }
      return 'en';
   },

   applyStoredLanguage: function () {
      const storedLang = this.getCurrentLanguage();
      if (storedLang && storedLang !== 'en') {
         setTimeout(() => {
            this.translateToLanguage(storedLang);
         }, 1000);
      }
   },

   translateToLanguage: function (lang) {
      const selectField = document.querySelector(".goog-te-combo");
      if (selectField) {
         selectField.value = lang;
         selectField.dispatchEvent(new Event("change"));
         this.removeGoogleBanner();
      }
   }
};

// ========================================
// GOOGLE TRANSLATE FUNCTIONALITY
// ========================================
// 
// ========================================
// NAVIGATION FUNCTIONALITY
// ========================================
function redirect_to(url) {
   // Get base URL from a global variable or data attribute
   const baseUrl = window.BASE_URL || document.querySelector('[data-base-url]')?.getAttribute('data-base-url') || '';
   window.location.href = baseUrl + url;
}

// ========================================
// ADDRESS FORM FUNCTIONALITY
// ========================================
const AddressHandler = {
   init: function () {
      this.bindPincodeInput();
      this.bindFormSubmit();
   },

   bindPincodeInput: function () {
      const pincodeInput = document.getElementById("pincodeInput");
      const countryInput = document.getElementById("countryInput");
      const stateInput = document.getElementById("stateInput");
      const districtInput = document.getElementById("districtInput");
      const cityInput = document.getElementById("cityInput");

      const disableFields = () => {
         stateInput.value = "";
         districtInput.value = "";
         cityInput.value = "";
      };

      pincodeInput?.addEventListener("input", () => {
         const pincode = pincodeInput.value.trim();

         if (pincode.length === 6 && /^[1-9][0-9]{5}$/.test(pincode)) {
            fetch(`https://api.postalpincode.in/pincode/${pincode}`)
               .then(res => res.json())
               .then(data => {
                  if (data[0].Status === "Success" && data[0].PostOffice && data[0].PostOffice.length > 0) {
                     const postOffice = data[0].PostOffice[0];
                     countryInput.value = "India";
                     stateInput.value = postOffice.State;
                     districtInput.value = postOffice.District;
                     cityInput.value = postOffice.Name;
                  } else {
                     alert("Invalid Pincode");
                     disableFields();
                  }
               })
               .catch(err => {
                  console.error("API Error:", err);
                  alert("Error checking pincode.");
                  disableFields();
               });
         } else {
            disableFields();
         }
      });
   },

   bindFormSubmit: function () {
      $('#addressForm-of-header').on('submit', function (e) {
         e.preventDefault();
         const baseUrl = window.BASE_URL || '';

         $.ajax({
            url: baseUrl + 'orders/save_address',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (response) {
               if (response.status === 'success') {
                  HeaderUtils.showToast('Address saved successfully!');
                  $('#addAddressModal').modal('hide');
                  $('#addressForm-of-header')[0].reset();
               } else {
                  alert('Error: ' + response.message);
               }
            },
            error: function (xhr) {
               alert('Something went wrong. Please try again.');
               console.log(xhr.responseText);
            }
         });
      });
   }
};

// ========================================
// DROPDOWN FUNCTIONALITY
// ========================================
const DropdownHandler = {
   init: function () {
      this.bindDropdownToggles();
      this.bindLanguageDropdown();
      this.bindOutsideClick();
   },

   bindDropdownToggles: function () {
      const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
      dropdownToggles.forEach(toggle => {
         toggle.addEventListener("click", function (event) {
            if (this.id === 'languageDropdown') return; // Skip language dropdown

            event.preventDefault();
            let dropdownMenu = this.nextElementSibling;

            document.querySelectorAll(".dropdown-menu").forEach(menu => {
               if (menu !== dropdownMenu) {
                  menu.classList.remove("show");
               }
            });

            dropdownMenu.classList.toggle("show");
         });
      });
   },

   bindLanguageDropdown: function () {
      const languageDropdown = document.getElementById("languageDropdown");
      const languageMenu = languageDropdown?.nextElementSibling;

      languageDropdown?.addEventListener("click", function (e) {
         e.preventDefault();
         languageMenu.classList.toggle("show");

         document.querySelectorAll(".dropdown-menu").forEach(menu => {
            if (menu !== languageMenu) menu.classList.remove("show");
         });
      });
   },

   bindOutsideClick: function () {
      document.addEventListener("click", function (event) {
         const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
         dropdownToggles.forEach(toggle => {
            let dropdownMenu = toggle.nextElementSibling;
            if (!toggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
               dropdownMenu.classList.remove("show");
            }
         });
      });
   }
};

// ========================================
// TAB NAVIGATION FUNCTIONALITY
// ========================================
const TabHandler = {
   init: function () {
      const tabs = document.querySelectorAll(".tab-item");
      const sections = document.querySelectorAll("[id]");

      // Click handler for tabs
      tabs.forEach((tab) => {
         tab.addEventListener("click", function () {
            tabs.forEach((t) => t.classList.remove("active"));
            this.classList.add("active");
         });
      });

      // Scroll handler for active tab highlighting
      window.addEventListener("scroll", function () {
         let current = "";
         sections.forEach((section) => {
            if (pageYOffset >= section.offsetTop - 150) {
               current = section.getAttribute("id");
            }
         });

         tabs.forEach((tab) => {
            tab.classList.remove("active");
            if (tab.getAttribute("data-target") === current) {
               tab.classList.add("active");
            }
         });
      });
   }
};

// ========================================
// MODAL FUNCTIONALITY
// ========================================
// In your ModalHandler.init() function
const ModalHandler = {
   init: function () {
      // Initialize profile modal without backdrop
      const profileModal = document.getElementById('profileModal');
      if (profileModal && !profileModal._modalInstance) {
         profileModal._modalInstance = new bootstrap.Modal(profileModal, {
            backdrop: false
         });
      }

      // Initialize address modal without backdrop
      const addressModal = document.getElementById('addAddressModal');
      if (addressModal && !addressModal._modalInstance) {
         addressModal._modalInstance = new bootstrap.Modal(addressModal, {
            backdrop: false
         });
      }
   }
};

function handleProfileModalClick(e) {
   e.preventDefault();
   const profileModal = document.getElementById('profileModal');
   if (profileModal && profileModal._modalInstance) {
      profileModal._modalInstance.show();
   }
}

openProfileModal

function handleProfileModalClick(e) {
   e.preventDefault();
   openProfileModal();
}

// ========================================
// INITIALIZATION
// ========================================
document.addEventListener("DOMContentLoaded", function () {
   DropdownHandler.init();
   TabHandler.init();
   ModalHandler.init();

   // Check if user is logged in (this will be set by PHP)
   if (window.USER_LOGGED_IN === true) {
      AddressHandler.init();
   }
});

// Loader removal
window.addEventListener("load", function () {
   const loaderWrapper = document.getElementById("loader-wrapper");
   if (loaderWrapper) {
      loaderWrapper.style.display = "none";
   }

   // Hide Google Translate banner
   let googleBanner = document.querySelector(".goog-te-banner-frame");
   if (googleBanner) {
      googleBanner.style.display = "none";
   }
   document.body.style.top = "0px";
});
