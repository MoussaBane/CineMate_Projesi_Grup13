const seats = document.getElementById("seatContainer");

class Seat {
  constructor(row, col, booked) {
    this.row = row;
    this.col = col;
    this.booked = booked;
  }
}

seatsArray = [];

for (let i = 0; i < 6; i++) {
  for (let j = 0; j < 8; j++) {
    seatsArray.push(new Seat(i, j, false));
  }
}

console.log(seatsArray);

seatsArray.forEach((seat) => {
  const seatDiv = document.createElement("div");
  seatDiv.classList.add("seat");
  seatDiv.classList.add(`row-${seat.row}`);
  seatDiv.classList.add(`col-${seat.col}`);

  seats.appendChild(seatDiv);
});

const toggleSelected = (e) => e.target.classList.toggle("selected");

let seatss = Array.from(document.getElementsByClassName("seat"));
// console.log(seatss);

let toplam = 0;
const price = () => {
  toplam = 0;
  for (seat of seatss) {
    if (seat.classList.contains("booked")) {
      toplam += 0;
    } else if (seat.classList.contains("selected")) {
      toplam += 1;
    }
  }
  //   console.log(toplam);
  document.getElementById("price").innerHTML =
    toplam +
    " kişilik seçtiniz. <br />" +
    "\n Ödeme tutarınız  :" +
    toplam * 120 +
    "₺";
};

for (seat of seatss) {
  seat.addEventListener("click", toggleSelected);
  seat.addEventListener("click", price);
}

bookBtn = document.getElementById("bookBtn");

const bookSeats = () => {
  seatss.forEach((seat) => {
    if (seat.classList.contains("selected")) {
      seat.classList.add("booked");
      seat.classList.remove("selected");
    }
  });
  toplam = 0;
  price();
};

bookBtn.addEventListener("click", bookSeats);
