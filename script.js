$(document).ready(function () {
    $("#submitButton").click(function () {
        // Get trimmed input values from the form
        const name = $("#name").val().trim();
        const email = $("#email").val().trim();
        const phone = $("#phone").val().trim();
        const address = $("#address").val().trim();

        if (name && email && phone && address) {
            // Validate email format
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return;
            }

            // Validate phone format (example: 10 digits)
            const phonePattern = /^\d{10}$/;
            if (!phonePattern.test(phone)) {
                alert("Please enter a valid 10-digit phone number.");
                return;
            }

            // Display the values in the response section
            $("#response").html(`
                <p><strong>Name:</strong> ${name}</p>
                <p><strong>Email:</strong> ${email}</p>
                <p><strong>Phone:</strong> ${phone}</p>
                <p><strong>Address:</strong> ${address}</p>
            `);

            // Show the response section with styling
            $("#response").removeClass("hidden");
            $("#registrationForm")[0].reset(); // Reset the form
        } else {
            // Display error message below form
            $("#response").html('<p style="color: red;">Please fill in all fields.</p>');
        }
    });
});
