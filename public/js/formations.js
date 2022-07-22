// const text = `
//       `.split("\n");

// // document.querySelector(".moreInfo").innerHTML = text.join("");
// const themes = [
//   "Risques physiques",
//   "Risques psychosociaux",
//   "prévention",
//   "formations des formateurs",
//   "instances du personnel",
//   "management / communication",
//   "secourisme",
// ];

// for (i = 0; i < themes.length; i++) {
//   const currentText = function () {
//     let text = "<ul>";
//     for (j = 0; j < Math.floor(Math.random() * 50); j++) {
//       const formation = "Formation " + j;
//       text += "<li><a href='" + link + "'>" + formation + "</a></li>";

//       if (
//         !Array.apply(null, document.querySelectorAll("option")).find(
//           (e) => e.value == formation
//         )
//       ) {
//         document.querySelector("datalist").innerHTML +=
//           "<option value='" + formation + "'>" + formation + "</option>";
//       }
//     }
//     return (text += "</ul>");
//   };

//   document.querySelector("section").innerHTML += `
//   <article class="tab" style="z-index: ${100 - i}">
//   <article class="tabContent">

// ${currentText()}

//  </article>

//    <article class="tabTitle" style="top:${i * themes.length}vh">
//      <h2>  ${themes[i]}</h2>
//   </article>
// </article>`;

//   document.querySelector(".accordion").innerHTML += `
//   <article class="accordion-item">
//   <h2 class="accordion-header" id="heading${i}">

//     <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${i}" aria-expanded="true" aria-controls="collapse${i}">
//     ${themes[i]}
//     </button>
//   </h2>
//   <article id="collapse${i}" class="accordion-collapse collapse " aria-labelledby="heading${i}" data-bs-parent="#accordionExample">
//     <article class="accordion-body">
//     ${currentText()}

//     </article>
//   </article>
// </article>
// `;
// }

document.querySelector("form").addEventListener("submit", function (event) {
  event.preventDefault();
  const value = document.querySelector("input").value;
  if (value) {
    const formation = formations.find((e) => e.name === value);
    if (formation) {
      const formationLink = formationPath.replace("slug", formation.slug);
      location.replace(formationLink);
    } else {
      const queryLink = queryPath + "?query=" + value;
      location.replace(queryLink);
    }
  }
});
