function validateEmail(email) {
    // Regular expression for validating an Email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$/;

    // Test the email against the regular expression
    return emailRegex.test(email);
}
function adminCheck(email,table,callback) {
    data = { email:email,table:table ,action:"validateUser" };
    $.ajax({
        method: 'POST',
        dataType: 'json',
        data: data,
        url: '../Api/auth.api.php',
        success: (res) => {
            callback(res.isFound);
        },
        error: (err) => {
            console.log(err);
            callback(false); // Assuming you want to handle errors by passing false
        }
    });
}




// Example usage:
// const isNotEmpty = areTextFieldsNotEmpty(
//     $(".username").val(),
//     $(".email").val(),
//     $(".password").val()
// );

// console.log(isNotEmpty);

// Example usage:

