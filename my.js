let slideIndex = 0;

function showSlides() {
    const slides = document.getElementsByClassName("mySlides");
    
    // Hide all slides
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1; // Reset to the first slide
    }
    
    slides[slideIndex - 1].style.display = "block"; // Show the current slide
    setTimeout(showSlides, 3000); // Change image every 1 second
}

// Start the slideshow
showSlides();






// calculator
function calculateDeposit() {
    const firstname = $('#firstname').val();
    const lastname = $('#lastname').val();

    if (firstname && lastname) {
        $.ajax({
            url: 'calculate.php',
            type: 'POST',
            data: { firstname: firstname, lastname: lastname },
            success: function (response) {
                $('#totalDeposit').text(response);
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    } else {
        alert('Please enter both first and last names.');
    }
}


