// ONLY IF WE ARE ON A SMALL DEVICE
if (window.innerWidth < 768) {
    // TODO we have to check (on server-side) if user is logged
    const bUserLogged = false;
    // Redirection to the mobile version according to user is logged or not
    if (bUserLogged) {
        window.location.href = "/src/views/match/list.html";
    } else {
        window.location.href = "/src/views/login.html";
    }
}
  