document.addEventListener("DOMContentLoaded", () => {
  const searcher = document.getElementById("searcher");
  const rows = document.querySelectorAll(".data-to-filter");

  if (searcher && rows) {
    searcher.addEventListener("input", (event) => {
      const value = event.target.value.toLowerCase();

      rows.forEach((row) => {
        const text = row.dataset.text.toLowerCase();

        if (text.toLowerCase().includes(value)) {
          row.style.display = "";
        } else {
          row.style.display = "none";
        }
      });
    })
  }
})
