

<!-- Floating Buttons Toggle -->
<div class="floating-buttons-toggle" onclick="toggleFloatingButtons()">
  <a class="floating-buttons-section-control ">
        <i class="las la-2x la-angle-double-right"></i>
    </a>
</div>

<!-- Floating Buttons Section -->
<div class="floating-buttons-container floating-buttons-section">
    <a class="floating-buttons-section-control d-lg-none" onclick="toggleFloatingButtons()">
        <i class="las la-2x la-angle-double-right"></i>
    </a>


    <!-- Compare Button -->
    <div id="compare-button" class="aiz-floating-button">
        <a href="{{ route('compare') }}">
            <span class="circle" id="cirone">
                <span class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 16 16">
                        <path
                            d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z"
                            transform="translate(-2.037 -2.038)" fill="#fff"></path>
                    </svg>
                </span>
            </span>
            <span class="text">
                <span class="w-120px mr-3">{{ translate('Compare') }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="7.073" height="12" viewBox="0 0 7.073 12">
                    <path d="M12.913,3.173,11.834,2.1,5.84,8.1l6,6,1.073-1.073L7.985,8.1Z"
                        transform="translate(12.913 14.1) rotate(180)" fill="#fff" />
                </svg>
            </span>
        </a>
    </div>

    <!-- Wishlist Button -->
      <div id="wishlist-button" class="aiz-floating-button">
        <a href="https://celcombazar.com/wishlists">
            <span class="circle" id="cirtwo">
                <span class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 16 14.4">
                        <g transform="translate(-3.05 -4.178)">
                            <path
                                d="M11.3,5.507l-.247.246L10.8,5.506A4.538,4.538,0,1,0,4.38,11.919l.247.247,6.422,6.412,6.422-6.412.247-.247A4.538,4.538,0,1,0,11.3,5.507Z"
                                transform="translate(0 0)" fill="#fff"></path>
                        </g>
                    </svg>
                </span>
            </span>
            <span class="text">
                <span class="w-120px mr-3">{{ translate('Wishlist') }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="7.073" height="12" viewBox="0 0 7.073 12">
                    <path d="M12.913,3.173,11.834,2.1,5.84,8.1l6,6,1.073-1.073L7.985,8.1Z"
                        transform="translate(12.913 14.1) rotate(180)" fill="#fff" />
                </svg>
            </span>
        </a>
        <span id="wishlist-count"
            style="position: absolute;top: 91px;right: 31px;font-size: 12px;color: #000000;font-weight: bold;z-index: 10000;background-color: #fffbfb;padding: 2px;border-radius: 10px;padding-left: 9px;padding-right: 8px;">0</span>
    </div>

      <!-- Save for Later Button -->
    <div id="save-for-later-button" class="aiz-floating-button">
        <a href="https://celcombazar.com/save-later">
            <span class="circle" id="cirthree">
                <span class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                        <g transform="translate(0 0)">
                            <path
                                d="M10,0A10,10,0,1,0,20,10,10,10,0,0,0,10,0Zm0,18.333A8.333,8.333,0,1,1,18.333,10,8.333,8.333,0,0,1,10,18.333Z"
                                fill="#fff" />
                            <path
                                d="M17.515,14.143,13,11.434V6a1,1,0,0,0-2,0v6a1.075,1.075,0,0,0,.485.857l5,3a1,1,0,1,0,1.03-1.714Z"
                                transform="translate(-2.588 -1.538)" fill="#fff" />
                        </g>
                    </svg>
                </span>

            </span>
            <span class="text">
                <span class="w-120px mr-3">{{ translate("Save for later") }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="7.073" height="12" viewBox="0 0 7.073 12">
                    <path d="M12.913,3.173,11.834,2.1,5.84,8.1l6,6,1.073-1.073L7.985,8.1Z"
                        transform="translate(12.913 14.1) rotate(180)" fill="#fff" />
                </svg>
            </span>
        </a>
        <span id="saved-count"
            style="position: absolute;top: 155px;right: 31px;font-size: 12px;color: #000000;font-weight: bold;z-index: 10000;background-color: #fffbfb;padding: 2px;border-radius: 10px;padding-left: 9px;padding-right: 8px;">0</span>
    </div>
</div>
 <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Function to fetch and update the saved count from /wishlist/count
            function updateSavedCount() {
                fetch('/wishlist/count')
                    .then(response => response.json())
                    .then(data => {
                        const savedCountElement = document.getElementById('saved-count');
                        savedCountElement.textContent = data.count;
                    })
                    .catch(error => console.error('Error fetching saved count:', error));
            }

            // Function to fetch and update the wishlist count from /user-wishlist/count
            function updateWishlistCount() {
                fetch('/user-wishlist/count')
                    .then(response => response.json())
                    .then(data => {
                        const wishlistCountElement = document.getElementById('wishlist-count');
                        wishlistCountElement.textContent = data.count;
                    })
                    .catch(error => console.error('Error fetching wishlist count:', error));
            }

            // Initial count updates
            updateSavedCount();
            updateWishlistCount();

            // Update every second (1000 milliseconds)
            setInterval(updateSavedCount, 1000);
            setInterval(updateWishlistCount, 1000);
        });

    </script>

<script>

function toggleFloatingButtons() {
    document.querySelector('.floating-buttons-container').classList.toggle('show');

    // Toggle rotation class
    const icon = document.querySelector('.floating-buttons-toggle i');
    icon.classList.toggle('rotated');
}

</script>
<style>
    /* General Button Styles */
    .aiz-floating-button {
        margin: 0;
        padding: 5px;
        border: 2px solid transparent;
        margin-bottom: 0px;
        transition: border 0.3s ease, box-shadow 0.3s ease;
    }

    #cirone:hover {
        width: 220px;
    }

    /* Individual Button Borders */
    #compare-button {
        border-color: #eddbdbad;
    }

    #wishlist-button {
        border-color: #eddbdbad;
        border-top: none;
    }

    #save-for-later-button {
        border-color: #eddbdbad;
        border-top: none;
    }

    /* Hover Effects */
    .floating-buttons-section .aiz-floating-button:hover {
        border-color: #ff5733;
        box-shadow: 0 0 8px rgba(255, 87, 51, 0.5);
    }

    /* Remove Border of Other Buttons on Hover */
    .floating-buttons-section:hover .aiz-floating-button {
        border-color: transparent;
    }
    @media (min-width: 320px) and (max-width: 767px) {
        .floating-buttons-section {
            display: none;
        }
    }

    /* Floating Button Container */
    .floating-buttons-container {
        position: fixed;
        left: -100px; /* Start hidden outside the viewport */
        top: 50%;
        transform: translateY(-50%);
        transition: left 0.5s ease-in-out;
    }

    .floating-buttons-container.show {
        left: 10px; /* Moves into view */
    }

    /* Toggle Button */
    .floating-buttons-toggle {
           position: fixed;
    left: 41px;
    top: 35% !important;
    transform: translateY(-50%);
    cursor: pointer;
    color: white;
    padding: 10px;
    border-radius: 5px;
    z-index: 10001;
    }
/* Rotation transition for the toggle button */
.floating-buttons-toggle i {
    transition: transform 0.3s ease-in-out;
}

/* Rotated state */
.floating-buttons-toggle i.rotated {
    transform: rotate(180deg);
}

    /* General Button Styles */
    .aiz-floating-button {
        margin: 0;
        padding: 5px;
        border: 2px solid transparent;
        margin-bottom: 0px;
        transition: border 0.3s ease, box-shadow 0.3s ease;
    }

    #cirone:hover {
        width: 220px;
    }

    /* Individual Button Borders */
    #compare-button {
        border-color: #eddbdbad;
    }

    #wishlist-button {
        border-color: #eddbdbad;
        border-top: none;
    }

    #save-for-later-button {
        border-color: #eddbdbad;
        border-top: none;
    }

    /* Hover Effects */
    .floating-buttons-section .aiz-floating-button:hover {
        border-color: #ff5733;
        box-shadow: 0 0 8px rgba(255, 87, 51, 0.5);
    }

    /* Hide Other Button Borders on Hover */
    .floating-buttons-section:hover .aiz-floating-button {
        border-color: transparent;
    }
    @media (max-width: 767px) {
    .floating-buttons-section,
    .floating-buttons-toggle {
        display: none !important;
    }
}

</style>
