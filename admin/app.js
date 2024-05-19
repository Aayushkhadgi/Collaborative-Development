// JavaScript code for the admin panel functionality

$(document).ready(function() {
    // Function to fetch user data
    function fetchUserData() {
        $.ajax({
            url: 'getUserData.php', // Change to the actual PHP script that fetches user data
            type: 'GET',
            dataType: 'html',
            success: function(response) {
                $('#userDataTable').html(response); // Display user data in the table
            },
            error: function(xhr, status, error) {
                console.error('Error fetching user data:', error);
            }
        });
    }

    // Event listener for the "View" button
    $('#viewUserDataBtn').click(function(e) {
        e.preventDefault();
        fetchUserData();
    });
});
