

document.addEventListener("DOMContentLoaded", () => {
    
    function showSection(sectionId) {
      const sections = document.querySelectorAll(".view");
      sections.forEach((section) => {
        section.classList.add("hidden");
      });
      const activeSection = document.getElementById(sectionId);
      activeSection.classList.remove("hidden");
    }
  
    
    function updateTime() {
      const currentTimeElement = document.getElementById("current-time");
      const now = new Date();
      const formattedTime = now.toLocaleTimeString(); 
      currentTimeElement.textContent = formattedTime;
    }
  
    
    const navLinks = document.querySelectorAll("nav a");
    navLinks.forEach((link) => {
      link.addEventListener("click", (event) => {
        event.preventDefault(); 
        const sectionId = link.getAttribute("href").substring(1); 
        showSection(sectionId);
      });
    });
  
    
    showSection("home"); 
    updateTime(); 
    setInterval(updateTime, 1000); 
  });
  