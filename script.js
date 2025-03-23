function changeView() {

    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");

}

function signUp() {

    var firstName = document.getElementById("fname");
    var lastName = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("pass");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    var form = new FormData;
    form.append("firstname", firstName.value);
    form.append("lastname", lastName.value);
    form.append("em", email.value);
    form.append("pw", password.value);
    form.append("mob", mobile.value);
    form.append("gender", gender.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                document.getElementById("msg").innerHTML = text;
                document.getElementById("msg").className = "bi bi-check2-circle fs-5";
                document.getElementById("alertdiv").className = "alert alert-success";
                document.getElementById("msgdiv").className = "d-block";
            } else {
                document.getElementById("msg").innerHTML = text;
                document.getElementById("msgdiv").className = "d-block";
            }
        }
    }

    request.open("POST", "signUpProcess.php", true);
    request.send(form);

}

function signIn() {

    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberme = document.getElementById("rememberme");

    var form = new FormData();
    form.append("email2", email.value);
    form.append("pass2", password.value);
    form.append("remember", rememberme.checked);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text2 = request.responseText;
            if (text2 == 'success') {
                window.location = "studenthome.php";
                document.getElementById("msg2").innerHTML = text2;
                document.getElementById("msg2").className = "bi bi-check2-circle fs-5";
                document.getElementById("alertdiv2").className = "alert alert-success";
                document.getElementById("msgdiv2").className = "d-block";
            } else {
                document.getElementById("msg2").innerHTML = text2;
                document.getElementById("msg2").className = "bi bi-x-octagon-fill fs-5";
                document.getElementById("alertdiv2").className = "alert alert-danger";
                document.getElementById("msgdiv2").className = "d-block";
            }

        }
    };

    request.open("POST", "signInProcess.php", true);
    request.send(form);

}

var bm;
function forgotPassword() {

    var sendEmail = document.getElementById("email2");

    var req = new XMLHttpRequest();

    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            var text3 = req.responseText;
            if (text3 == "success") {
                alert("Verification code has sent to your Email. Please check your inbox");
                var modal = document.getElementById("forgotPasswordModal");
                bm = new bootstrap.Modal(modal);
                bm.show();

            } else {
                alert(text3);
            }
        }
    }

    req.open("GET", "studentforgotPass.php?email2=" + sendEmail.value, true);
    req.send();

}

function ShowPass() {

    var input = document.getElementById("newpassinput");
    var eye = document.getElementById("eye1");

    if (input.type == "password") {
        input.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        input.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }
}

function ShowRetypePass() {
    var input = document.getElementById("retypepassinput");
    var eye = document.getElementById("eye2");

    if (input.type == "password") {
        input.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        input.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }
}

function resetpass() {
    var email = document.getElementById("email2");
    var newpw = document.getElementById("newpassinput");
    var retypepw = document.getElementById("retypepassinput");
    var verify = document.getElementById("verifycode");

    var form = new FormData();
    form.append("em", email.value);
    form.append("npw", newpw.value);
    form.append("rtpw", retypepw.value);
    form.append("vc", verify.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text4 = request.responseText;
            if (text4 == "success") {

                bm.hide();
                alert("Password Reset Success");
            } else {
                alert(text4);
            }
        }
    };

    request.open("POST", "studentresetPass.php", true);
    request.send(form);

}

function signout() {
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text5 = request.responseText;
            if (text5 == "success") {
                window.location.reload();
            } else {
                alert(text5);
            }
        }
    };

    request.open("GET", "SignoutProcess.php", true);
    request.send();
}

function changeimg() {
    var view = document.getElementById("viewimg");       //Get id from profile image
    var filechooser = document.getElementById("profileimg"); //Get file chooser

    filechooser.onchange = function () {
        var file1 = this.files[0];
        var url = window.URL.createObjectURL(file1);
        view.src = url;
    }
}

function updatePro() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mob");
    var line1 = document.getElementById("add01");
    var line2 = document.getElementById("add02");
    var province = document.getElementById("province");
    var district = document.getElementById("district");
    var city = document.getElementById("city");
    var postal = document.getElementById("postal");
    var image = document.getElementById("profileimg");

    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("mob", mobile.value);
    form.append("add01", line1.value);
    form.append("add02", line2.value);
    form.append("province", province.value);
    form.append("district", district.value);
    form.append("city", city.value);
    form.append("postal", postal.value);

    if (image.files.length == 0) {
        var confirmation =
            confirm("Are you sure You don't need to update Profile image ??");

        if (confirmation) {
            alert("You haven't selected any image");
        }

    } else {
        form.append("image", image.files[0]);
    }

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text6 = request.responseText;
            if (text6 == "success") {
                window.location.reload();
            } else {
                alert(text6);
            }
        }
    }

    request.open("POST", "studentupdateProfileProcess.php", true);
    request.send(form);


}

function signUp1() {

    var firstName = document.getElementById("fname");
    var lastName = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("pass");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    var form = new FormData;
    form.append("firstname", firstName.value);
    form.append("lastname", lastName.value);
    form.append("em", email.value);
    form.append("pw", password.value);
    form.append("mob", mobile.value);
    form.append("gender", gender.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                document.getElementById("msg").innerHTML = text;
                document.getElementById("msg").className = "bi bi-check2-circle fs-5";
                document.getElementById("alertdiv").className = "alert alert-success";
                document.getElementById("msgdiv").className = "d-block";
            } else {
                document.getElementById("msg").innerHTML = text;
                document.getElementById("msgdiv").className = "d-block";
            }
        }
    }

    request.open("POST", "teachersignupProcess.php", true);
    request.send(form);

}

function signIn1() {

    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberme = document.getElementById("rememberme");

    var form = new FormData();
    form.append("email2", email.value);
    form.append("pass2", password.value);
    form.append("remember", rememberme.checked);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text2 = request.responseText;
            if (text2 == 'success') {
                window.location = "teacherhome.php";
                document.getElementById("msg2").innerHTML = text2;
                document.getElementById("msg2").className = "bi bi-check2-circle fs-5";
                document.getElementById("alertdiv2").className = "alert alert-success";
                document.getElementById("msgdiv2").className = "d-block";
            } else {
                document.getElementById("msg2").innerHTML = text2;
                document.getElementById("msg2").className = "bi bi-x-octagon-fill fs-5";
                document.getElementById("alertdiv2").className = "alert alert-danger";
                document.getElementById("msgdiv2").className = "d-block";
            }

        }
    };

    request.open("POST", "teachersigninProcess.php", true);
    request.send(form);

}

var bm;
function forgotPassword1() {

    var sendEmail = document.getElementById("email2");

    var req = new XMLHttpRequest();

    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            var text3 = req.responseText;
            if (text3 == "success") {
                alert("Verification code has sent to your Email. Please check your inbox");
                var modal = document.getElementById("forgotPasswordModal");
                bm = new bootstrap.Modal(modal);
                bm.show();

            } else {
                alert(text3);
            }
        }
    }

    req.open("GET", "teacherForgetPass.php?email2=" + sendEmail.value, true);
    req.send();

}

function ShowPass1() {

    var input = document.getElementById("newpassinput");
    var eye = document.getElementById("eye1");

    if (input.type == "password") {
        input.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        input.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }
}

function ShowRetypePass1() {
    var input = document.getElementById("retypepassinput");
    var eye = document.getElementById("eye2");

    if (input.type == "password") {
        input.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        input.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }
}

function resetpass1() {
    var email = document.getElementById("email2");
    var newpw = document.getElementById("newpassinput");
    var retypepw = document.getElementById("retypepassinput");
    var verify = document.getElementById("verifycode");

    var form = new FormData();
    form.append("em", email.value);
    form.append("npw", newpw.value);
    form.append("rtpw", retypepw.value);
    form.append("vc", verify.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text4 = request.responseText;
            if (text4 == "success") {

                bm.hide();
                alert("Password Reset Success");
            } else {
                alert(text4);
            }
        }
    };

    request.open("POST", "teacherResetPass.php", true);
    request.send(form);

}

function signout1() {
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text5 = request.responseText;
            if (text5 == "success") {
                window.location.reload();
            } else {
                alert(text5);
            }
        }
    };

    request.open("GET", "teachersignOutProcess.php", true);
    request.send();
}

function changeimg1() {
    var view = document.getElementById("viewimg");       //Get id from profile image
    var filechooser = document.getElementById("profileimg"); //Get file chooser

    filechooser.onchange = function () {
        var file1 = this.files[0];
        var url = window.URL.createObjectURL(file1);
        view.src = url;
    }
}

function updatePro1() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mob");
    var line1 = document.getElementById("add01");
    var line2 = document.getElementById("add02");
    var province = document.getElementById("province");
    var district = document.getElementById("district");
    var city = document.getElementById("city");
    var postal = document.getElementById("postal");
    var image = document.getElementById("profileimg");

    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("mob", mobile.value);
    form.append("add01", line1.value);
    form.append("add02", line2.value);
    form.append("province", province.value);
    form.append("district", district.value);
    form.append("city", city.value);
    form.append("postal", postal.value);

    if (image.files.length == 0) {
        var confirmation =
            confirm("Are you sure You don't need to update Profile image ??");

        if (confirmation) {
            alert("You haven't selected any image");
        }

    } else {
        form.append("image", image.files[0]);
    }

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text6 = request.responseText;
            if (text6 == "success") {
                window.location.reload();
            } else {
                alert(text6);
            }
        }
    }

    request.open("POST", "teacherUpdateProfileProcess.php", true);
    request.send(form);


}

function signUp2() {

    var firstName = document.getElementById("fname");
    var lastName = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("pass");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    var form = new FormData;
    form.append("firstname", firstName.value);
    form.append("lastname", lastName.value);
    form.append("em", email.value);
    form.append("pw", password.value);
    form.append("mob", mobile.value);
    form.append("gender", gender.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                document.getElementById("msg").innerHTML = text;
                document.getElementById("msg").className = "bi bi-check2-circle fs-5";
                document.getElementById("alertdiv").className = "alert alert-success";
                document.getElementById("msgdiv").className = "d-block";
            } else {
                document.getElementById("msg").innerHTML = text;
                document.getElementById("msgdiv").className = "d-block";
            }
        }
    }

    request.open("POST", "academicSignUpProcess.php", true);
    request.send(form);

}

function signIn2() {

    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberme = document.getElementById("rememberme");

    var form = new FormData();
    form.append("email2", email.value);
    form.append("pass2", password.value);
    form.append("remember", rememberme.checked);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text2 = request.responseText;
            if (text2 == 'success') {
                window.location = "academichome.php";
                document.getElementById("msg2").innerHTML = text2;
                document.getElementById("msg2").className = "bi bi-check2-circle fs-5";
                document.getElementById("alertdiv2").className = "alert alert-success";
                document.getElementById("msgdiv2").className = "d-block";
            } else {
                document.getElementById("msg2").innerHTML = text2;
                document.getElementById("msg2").className = "bi bi-x-octagon-fill fs-5";
                document.getElementById("alertdiv2").className = "alert alert-danger";
                document.getElementById("msgdiv2").className = "d-block";
            }

        }
    };

    request.open("POST", "academicSignInProcess.php", true);
    request.send(form);

}

var bm;
function forgotPassword2() {

    var sendEmail = document.getElementById("email2");

    var req = new XMLHttpRequest();

    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            var text3 = req.responseText;
            if (text3 == "success") {
                alert("Verification code has sent to your Email. Please check your inbox");
                var modal = document.getElementById("forgotPasswordModal");
                bm = new bootstrap.Modal(modal);
                bm.show();

            } else {
                alert(text3);
            }
        }
    }

    req.open("GET", "academicForgetPass.php?email2=" + sendEmail.value, true);
    req.send();

}

function ShowPass2() {

    var input = document.getElementById("newpassinput");
    var eye = document.getElementById("eye1");

    if (input.type == "password") {
        input.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        input.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }
}

function ShowRetypePass2() {
    var input = document.getElementById("retypepassinput");
    var eye = document.getElementById("eye2");

    if (input.type == "password") {
        input.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        input.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }
}

function resetpass2() {
    var email = document.getElementById("email2");
    var newpw = document.getElementById("newpassinput");
    var retypepw = document.getElementById("retypepassinput");
    var verify = document.getElementById("verifycode");

    var form = new FormData();
    form.append("em", email.value);
    form.append("npw", newpw.value);
    form.append("rtpw", retypepw.value);
    form.append("vc", verify.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text4 = request.responseText;
            if (text4 == "success") {

                bm.hide();
                alert("Password Reset Success");
            } else {
                alert(text4);
            }
        }
    };

    request.open("POST", "academicResetPass.php", true);
    request.send(form);

}

function signout2() {
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text5 = request.responseText;
            if (text5 == "success") {
                window.location.reload();
            } else {
                alert(text5);
            }
        }
    };

    request.open("GET", "academicSignOutProcess.php", true);
    request.send();
}

function changeimg2() {
    var view = document.getElementById("viewimg");       //Get id from profile image
    var filechooser = document.getElementById("profileimg"); //Get file chooser

    filechooser.onchange = function () {
        var file1 = this.files[0];
        var url = window.URL.createObjectURL(file1);
        view.src = url;
    }
}

function updatePro2() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mob");
    var line1 = document.getElementById("add01");
    var line2 = document.getElementById("add02");
    var province = document.getElementById("province");
    var district = document.getElementById("district");
    var city = document.getElementById("city");
    var postal = document.getElementById("postal");
    var image = document.getElementById("profileimg");

    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("mob", mobile.value);
    form.append("add01", line1.value);
    form.append("add02", line2.value);
    form.append("province", province.value);
    form.append("district", district.value);
    form.append("city", city.value);
    form.append("postal", postal.value);

    if (image.files.length == 0) {
        var confirmation =
            confirm("Are you sure You don't need to update Profile image ??");

        if (confirmation) {
            alert("You haven't selected any image");
        }

    } else {
        form.append("image", image.files[0]);
    }

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text6 = request.responseText;
            if (text6 == "success") {
                window.location.reload();
            } else {
                alert(text6);
            }
        }
    }

    request.open("POST", "academicUpdateProfileProcess.php", true);
    request.send(form);


}

var av;
function adminVerification() {
    var email = document.getElementById("e");

    var adminForm = new FormData();
    adminForm.append("e", email.value);

    var req = new XMLHttpRequest();

    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            var t = req.responseText;
            if (t == "success") {
                var adminVerificationModal = document.getElementById("veriFicationModal");
                av = new bootstrap.Modal(adminVerificationModal);
                av.show();
            } else {
                alert(t);
            }
        }
    }
    req.open("POST", "adminVeriFicationProcess.php", true);
    req.send(adminForm);
}

function verify() {
    var VeriFication = document.getElementById("vCode");

    var req = new XMLHttpRequest();

    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            var t = req.responseText;
            if (t == "success") {
                av.hide();
                window.location = "Adminpanel.php";
            } else {
                alert(t);
            }
        }
    }
    req.open("GET", "veriFicationProcess.php?v=" + VeriFication.value, true);
    req.send();
}

function blockUser(email) {
    var req = new XMLHttpRequest();

    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            var txt = req.responseText;
            if (txt == "Blocked") {
                document.getElementById("UB" + email).innerHTML = "UNBLOCK";
                document.getElementById("UB" + email).classList = "btn btn-success rounded-circle text-uppercase fw-bold";
            } else if (txt == "UnBlocked") {
                document.getElementById("UB" + email).innerHTML = "BLOCK";
                document.getElementById("UB" + email).classList = "btn btn-danger rounded-circle text-uppercase fw-bold";
            } else {
                alert(txt);
            }
        }
    }

    req.open("GET", "StudentBlockProcess.php?email=" + email, true);
    req.send();
}

function searchMU() {
    var search = document.getElementById("mu").value;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;
            document.getElementById("searchResults").innerHTML = text;

        }
    }
    request.open("GET", "Stu_SearchInmanageUser.php?mu=" + search, true);
    request.send();

}

function blockUser1(email) {
    var req = new XMLHttpRequest();

    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            var txt = req.responseText;
            if (txt == "Blocked") {
                document.getElementById("UB" + email).innerHTML = "UNBLOCK";
                document.getElementById("UB" + email).classList = "btn btn-success rounded-circle text-uppercase fw-bold";
            } else if (txt == "UnBlocked") {
                document.getElementById("UB" + email).innerHTML = "BLOCK";
                document.getElementById("UB" + email).classList = "btn btn-danger rounded-circle text-uppercase fw-bold";
            } else {
                alert(txt);
            }
        }
    }

    req.open("GET", "teacherBlockProcess.php?email=" + email, true);
    req.send();
}

function searchMU1() {
    var search = document.getElementById("mu").value;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;
            document.getElementById("searchResults").innerHTML = text;

        }
    }
    request.open("GET", "teacher_SeachINmanageUser.php?mu=" + search, true);
    request.send();
}

function blockUser2(email) {
    var req = new XMLHttpRequest();

    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            var txt = req.responseText;
            if (txt == "Blocked") {
                document.getElementById("UB" + email).innerHTML = "UNBLOCK";
                document.getElementById("UB" + email).classList = "btn btn-success rounded-circle text-uppercase fw-bold";
            } else if (txt == "UnBlocked") {
                document.getElementById("UB" + email).innerHTML = "BLOCK";
                document.getElementById("UB" + email).classList = "btn btn-danger rounded-circle text-uppercase fw-bold";
            } else {
                alert(txt);
            }
        }
    }

    req.open("GET", "academicBlockProcess.php?email=" + email, true);
    req.send();
}

function searchMU2() {
    var search = document.getElementById("mu").value;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;
            document.getElementById("searchResults").innerHTML = text;

        }
    }
    request.open("GET", "academic_searchINmanageuser.php?mu=" + search, true);
    request.send();

}

function searchMU3() {
    var search = document.getElementById("mu").value;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;
            document.getElementById("searchResults").innerHTML = text;

        }
    }
    request.open("GET", "admin_SearchINmanageuser.php?mu=" + search, true);
    request.send();
}

function updateProad() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");

    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text6 = request.responseText;
            if (text6 == "success") {
                window.location.reload();
            } else {
                alert(text6);
            }
        }
    }
    request.open("POST", "adminupdateprofile.php", true);
    request.send(form);
}

function signout3() {
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text5 = request.responseText;
            if (text5 == "success") {
                window.location.reload();
            } else {
                alert(text5);
            }
        }
    };

    request.open("GET", "adminsignOutProcess.php", true);
    request.send();
}

var tv;
function teacherVerification() {
    var email = document.getElementById("e");

    var Form = new FormData();
    Form.append("e", email.value);

    var req = new XMLHttpRequest();

    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            var t = req.responseText;
            if (t == "success") {
                var teacherVerificationModal = document.getElementById("veriFicationModal");
                tv = new bootstrap.Modal(teacherVerificationModal);
                tv.show();
            } else {
                alert(t);
            }
        }
    }
    req.open("POST", "AssignmentVerifyProcess.php", true);
    req.send(Form);
}

function Teacher_verify() {
    var VeriFication = document.getElementById("vCode");

    var req = new XMLHttpRequest();

    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            var t = req.responseText;
            if (t == "success") {
                tv.hide();
                window.location = "Assignment.php";
            } else {
                alert(t);
            }
        }
    }
    req.open("GET", "AssignmentverificationProcess.php?v=" + VeriFication.value, true);
    req.send();
}

function clearSort() {
    window.location.reload();
}

function addAS(){
    var subject = document.getElementById("subject");
    var grade = document.getElementById("grade");
    var title = document.getElementById("title");
    var description = document.getElementById("desc");

    var form = new FormData();

    form.append("subject", subject);
    form.append("grade", grade);
    form.append("title", title);
    form.append("desc", description);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text7 = request.responseText;
            if (text7 == "Assignment Saved Successfully") {
                window.location.reload();
                document.getElementById("addmsg").innerHTML = text7;
                document.getElementById("addmsg").className = "bi bi-check2-circle fs-5";
                document.getElementById("addalertdiv").className = "alert alert-success";
                document.getElementById("addmsgdiv").className = "d-block";
            } else {

                document.getElementById("addmsg").innerHTML = text7;
                document.getElementById("addmsg").className = "bi bi-x-octagon-fill fs-5";
                document.getElementById("addalertdiv").className = "alert alert-danger";
                document.getElementById("addmsgdiv").className = "d-block";
            }
        }

    };

    request.open("POST", "AssignmentProcess.php", true);
    request.send(form);

}

function submitMarks() {
    var Marks = document.getElementById("marks");
    var assi = document.getElementById("assignment");

    var form = new FormData;
    form.append("marks", Marks.value);
    form.append("assignment", assi.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                document.getElementById("msg").innerHTML = text;
                document.getElementById("msg").className = "bi bi-check2-circle fs-5";
                document.getElementById("alertdiv").className = "alert alert-success";
                document.getElementById("msgdiv").className = "d-block";
            } else {
                document.getElementById("msg").innerHTML = text;
                document.getElementById("msgdiv").className = "d-block";
            }
        }
    }

    request.open("POST", "submitMarkProcess.php", true);
    request.send(form);
}

function rMarks() {
    var Marks = document.getElementById("marks");
    var assi = document.getElementById("assignment");

    var form = new FormData;
    form.append("marks", Marks.value);
    form.append("assignment", assi.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                document.getElementById("msg").innerHTML = text;
                document.getElementById("msg").className = "bi bi-check2-circle fs-5";
                document.getElementById("alertdiv").className = "alert alert-success";
                document.getElementById("msgdiv").className = "d-block";
            } else {
                document.getElementById("msg").innerHTML = text;
                document.getElementById("msgdiv").className = "d-block";
            }
        }
    }

    request.open("POST", "rMarkProcess.php", true);
    request.send(form);
}


