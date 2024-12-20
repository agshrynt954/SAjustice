const timeline = document.getElementById("scrollableTimeline");

let isDown = false;
let startX;
let scrollLeft;

timeline.addEventListener("mousedown", (e) => {
  isDown = true;
  timeline.classList.add("active");
  startX = e.pageX - timeline.offsetLeft;
  scrollLeft = timeline.scrollLeft;
});

timeline.addEventListener("mouseleave", () => {
  isDown = false;
  timeline.classList.remove("active");
});

timeline.addEventListener("mouseup", () => {
  isDown = false;
  timeline.classList.remove("active");
});

timeline.addEventListener("mousemove", (e) => {
  if (!isDown) return;
  e.preventDefault();
  const x = e.pageX - timeline.offsetLeft;
  const walk = (x - startX) * 2; 
  timeline.scrollLeft = scrollLeft - walk;
});
