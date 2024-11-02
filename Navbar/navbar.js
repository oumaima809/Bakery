document.addEventListener("DOMContentLoaded", () => {
    const userDropdown = document.getElementById("userDropdown");
    const dropdownContent = document.getElementById("dropdownContent");

    userDropdown.addEventListener("click", () => {
        // Toggle the display of the dropdown content
        if (dropdownContent.style.display === "none" || dropdownContent.style.display === "") {
            dropdownContent.style.display = "block"; // Show dropdown
        } else {
            dropdownContent.style.display = "none"; // Hide dropdown
        }
        
    });

    // Optionally, hide the dropdown when clicking outside of it
    window.addEventListener("click", (event) => {
        if (!userDropdown.contains(event.target) && !dropdownContent.contains(event.target)) {
            dropdownContent.style.display = "none"; // Hide dropdown if clicking outside
        }
    });
});
