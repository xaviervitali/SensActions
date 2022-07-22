// const tbody = document.querySelector("tbody");
// const nbOfComments = Math.floor(Math.random() * 100);
// document.querySelector(".nbOfComments").innerText = nbOfComments;
// let comments = [];
// for (let i = 0; i < nbOfComments; i++) {
//   comments.push({
//     name: faker.name.findName(),
//     date: faker.date.past(),
//     comment: faker.lorem.paragraphs(Math.floor(Math.random() * 10)),
//   });
// }

// comments
//   .sort((a, b) => a.date - b.date)
//   .forEach(
//     (comment) =>
//       (tbody.innerHTML += `<tr><td>${comment.name}</td><td>${new Date(
//         comment.date
//       ).toLocaleDateString()}</td><td>${comment.comment}</td></tr> `)
//   );

/**
 * Partie stats
 */
const ratingStars = document.querySelectorAll(".stats .fa-regular");

// const trainningRate = 90;
// document.querySelector(".successRate").innerText = 85;
// // document.querySelector(".successRate").innerText = Math.floor(
// //   Math.random() * 100
// // );
// document.querySelector(".nbOfStudents").innerText = Math.floor(
//   Math.random() * 10000
// );

if (satisfaction) {
  const starsFilled = Math.floor((satisfaction / 100) * ratingStars.length);

  const halfStars = satisfaction % starsFilled;
  let i = 0;
  ratingStars.forEach((star) => {
    if (i < starsFilled) {
      star.classList = "fa-solid fa-star";
      i++;
    }
  });

  if (halfStars != 0) {
    ratingStars[i].classList = "fa-regular fa-star-half-stroke";
  }
}
