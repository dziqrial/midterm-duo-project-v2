function toggleNav() {
  const overlay = document.getElementById("menuOverlay");
  overlay.classList.toggle("active");

  // Disable scroll when menu open
  document.body.style.overflow = overlay.classList.contains("active")
    ? "hidden"
    : "auto";
}
