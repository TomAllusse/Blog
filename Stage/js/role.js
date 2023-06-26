function ChangeRole(element, UserID) {

    var role =  element.value;
    
    if(role == 'ROLE_USER'){
        window.location.href = "admin.php?role=ROLE_ADMIN&userid="+UserID;
    }
    if(role == 'ROLE_ADMIN'){
        window.location.href = "admin.php?role=ROLE_USER&userid="+UserID;
    }
}

function myRole2(element, UserID) {

    var role =  element.value;
    
    if(role == 'ROLE_USER'){
        window.location.href = "test2.php?role=ROLE_ADMIN&userid=" + UserID;
    }
    if(role == 'ROLE_ADMIN'){
        window.location.href = "test2.php?role=ROLE_USER&userid=" + UserID;
    }
}
