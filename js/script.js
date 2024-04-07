function validateEmail() {
    const emailInput = document.getElementById('email');
    const emailError = document.getElementById('emailError');
    const email = emailInput.value;
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!regex.test(email)) {
        emailInput.classList.add('is-invalid');
        emailError.textContent = 'Invalid email address';
        return false;
    } else {
        emailInput.classList.remove('is-invalid');
        emailError.textContent = '';
        return true;
    }
}

function validatePhone() {
    const phoneInput = document.getElementById('phone');
    const phoneError = document.getElementById('phoneError');
    const phone = phoneInput.value;
    const regex = /^\d{10}$/;
    if (!regex.test(phone)) {
        phoneInput.classList.add('is-invalid');
        phoneError.textContent = 'Invalid phone number';
        return false;
    } else {
        phoneInput.classList.remove('is-invalid');
        phoneError.textContent = '';
        return true;
    }
}


$(document).ready(function () {
    $("#submitButton").click(function () {
        if ($("#studentForm")[0].checkValidity()) {
            $.ajax({
                url: "config/insert.php",
                type: "POST",
                data: $("#studentForm").serialize(),
                dataType: 'json', 
                success: function (response) {
                    $("#studentForm")[0].reset();
                    loadStudents();
                    if (response.status === 'success') {
                        $('#message').html('<p style="color: green;">' + response.message + '</p>'); 
                    } else {
                        $('#message').html('<p style="color: red;">' + response.message + '</p>'); 
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    $('#message').html('<p style="color: red;">' + error + '</p>'); 
                }
            });
        } else {
            console.log("Form validation failed.");
        }
    });
});

function loadStudents() {
    $.ajax({
        url: "config/loadStd.php",
        type: "GET",
        dataType: "json",
        success: function (data) {
            var tableBody = $('#studentTable tbody');
            tableBody.empty();
            $.each(data, function (index, student) {
                var row = '<tr>' +
                    '<td>' + student.std_Id + '</td>' +
                    '<td>' + student.name + '</td>' +
                    '<td>' + student.birthday + '</td>' +
                    '<td>' + student.address + '</td>' +
                    '<td>' + student.phone + '</td>' +
                    '<td>' + student.email + '</td>' +
                    '<td>' +
                    '<button class="btn btn-danger deleteBtn" id="deleteBtn'+student.std_Id+'" data-id="' + student.std_Id + '" onclick="deleteStd(' + student.std_Id + ')">Delete</button>' +
                    '<button class="btn btn-primary updateBtn" id="updateBtn'+student.std_Id+'" data-id="' + student.std_Id + '" onclick="updateStd(' + student.std_Id + ')">Update</button>' +
                    '</td>' +
                    '</tr>';
                tableBody.append(row);
            });
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}

loadStudents();

function deleteStd() {
    alert();
}

// $('#studentTable').on('click', '.deleteBtn', function () {
function deleteStd(studentId) {
    // var studentId = $(this).data('id');
    if (confirm('Are you sure you want to delete this student record?')) {
        $.ajax({
            url: "config/deletestd.php",
            type: "POST",
            data: { student_id: studentId },
            success: function (response) {
                alert(response);
                loadStudents();
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
}
}
// });

// $('#studentTable').on('click', '.updateBtn', function () {
function updateStd(studentId) {
    // alert(studentId);
    // var studentId = $(this).data('id');
        $.ajax({
            url: "config/loadFormData.php",
            type: "GET",
            data: { student_id: studentId },
            dataType: "json",
            success: function (data) {
                console.log(data);
                console.log("Student ID:", data[0].std_Id);
                console.log("Name:", data[0].name);

                // Ensure that update form fields are correctly populated
                $('#updateId').val(data[0].std_Id);
                $('#updateName').val(data[0].name);
                $('#updateBirthday').val(data[0].birthday);
                $('#updateAddress').val(data[0].address);
                $('#updatePhone').val(data[0].phone);
                $('#updateEmail').val(data[0].email);
                
                // Show the update modal
                $('#updateModal').show();
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
// });
}

// $('#studentTable').on('click', '.updateBtn', function () {
//     var studentId = $(this).data('id');
//     $.ajax({
//         url: "config/loadStd.php",
//         type: "GET",
//         data: { student_id: studentId },
//         dataType: "json",
//         success: function (data) {
//             console.log(data);
//             console.log("Student ID:", data[0].std_Id);
//             console.log("Name:", data[0].name);

//             $('#updateId').val(data[0].std_Id);
//             $('#updateName').val(data[0].name);
//             $('#updateBirthday').val(data[0].birthday);
//             $('#updateAddress').val(data[0].address);
//             $('#updatePhone').val(data[0].phone);
//             $('#updateEmail').val(data[0].email);
//             // document.getElementById("#updateId").value = data.std_Id;
            
//             $('#updateModal').show();
//         },
//         error: function (xhr, status, error) {
//             console.error(error);
//         }
//     });
// });

$('.close').click(function () {
    $('#updateModal').hide();
});

$('#updateForm').submit(function (e) {
    e.preventDefault(); 
    var formData = $(this).serialize();
    
    $.ajax({
        url: "config/updatestd.php",
        type: "POST",
        data: formData,
        success: function (response) {
            alert(response);
            
            loadStudents();
            
            $('#updateModal').hide();
        },
        error: function (xhr, status, error) {
            console.error(error);
            alert("Error updating student: " + error);
        }
    });
});


loadStudents();