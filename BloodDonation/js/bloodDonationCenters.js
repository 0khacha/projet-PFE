$(document).ready(function() {
    // Function to update the blood donation center dropdown based on the selected city
    function updateBloodDonationCenters() {
        const selectedCity = $("#cityTown").val().toUpperCase();

        $.ajax({
            url: "getBloodCenters.php",
            method: "POST",
            data: { city: selectedCity },
            success: function(data) {
                $("#bloodDonationCenter").html(data);
            },
            error: function(error) {
                console.error("Error fetching blood donation centers:", error);
            }
        });
    }

    // Attach the update function to the city input's change event
    $("#cityTown").on("change", updateBloodDonationCenters);

    // Initial update when the page loads
    updateBloodDonationCenters();

    // Attach the toggle function to the "Previous Donations" dropdown's change event
    $("#previousDonations").on("change", function() {
        var previousDonations = $(this).val();
        var lastDonationDateLabel = $("#lastDonationDateLabel");
        var lastDonationDate = $("#lastDonationDate");

        if (previousDonations === 'yes') {
            lastDonationDateLabel.show();
            lastDonationDate.show();
        } else {
            lastDonationDateLabel.hide();
            lastDonationDate.hide();
        }
    });
});
