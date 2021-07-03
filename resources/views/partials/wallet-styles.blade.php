<style>
    * {
  font-family: "Open Sans", sans-serif;
  letter-spacing: 1px;
}





.mobile {
  width: 360px;
  height: 640px;
  align-self: center;
  display: grid;
  grid-template-rows: 10% auto;
  color: #fff;
}

.mobile > div {
  padding: 1rem 2rem;
}

.header {
  background: #21223f;
  border-top-left-radius: 1rem;
  border-top-right-radius: 1rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.filter {
  display: flex;
  padding: 0.5rem;
  min-width: 80px;
  justify-content: space-between;
  align-items: center;
  border: 1px solid #828393;
  border-radius: 10px;
}

.calendar i,
.select i,
.total .label {
  color: #828393;
}

.content2 {
  background: #21223f;
  border-bottom-left-radius: 1rem;
  border-bottom-right-radius: 1rem;
  display: grid;
}

.total {
  align-self: start;
  justify-self: center;
  padding: 1rem;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.total > div:not(:first-child):not(:last-child) {
  margin: 0.5rem;
}

.total .label,
.card .label {
  text-transform: uppercase;
  font-weight: 100;
  font-size: 0.8rem;
}

.total .value {
  font-size: 1.8rem;
}

.total .balance {
  background: #1f3a4a;
  padding: 0.5rem 1rem;
  border-radius: 5px;
  color: #02ca8c;
}

.cards {
  display: grid;
  overflow-x: auto;
  overflow-y: hidden;
  grid-template-columns: repeat(auto-fill, minmax(auto, 0));
  grid-gap: 10px;
  align-self: start;
}

.card {
  min-width: 130px;
  height: 90px;
  padding: 1rem;
  border-radius: 10px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.green {
  background: #00cccc;
}

.magenta {
  background: #7359ff;
}

.gray {
  background: #7a7faf;
}

.card .balance {
  display: flex;
  align-self: start;
  padding: 0.5rem 0;
  width: 60px;
  justify-content: space-around;
  font-size: 0.8rem;
}

.card .label {
  color: #adffff;
  font-size: 0.7rem;
}

.card .item {
  align-self: start;
  padding: 0.5rem 0;
  height: 36px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.card .arrow-up {
  transform: rotateZ(45deg);
}

.card .item .value {
  font-size: 1.3rem;
}

::-webkit-scrollbar {
  height: 5px;
  width: 5px;
}

::-webkit-scrollbar-track {
  box-shadow: inset 0 0 6px #21233f;
}

::-webkit-scrollbar-thumb {
  background-color: #676767;
  border-radius: 10px;
}

.menu {
  list-style-type: none;
  padding: 0;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 2px;
}

.menu li {
  height: 40px;
  position: relative;
}

.menu label,
.menu input {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  opacity: 0.7;
}

.menu input[type="radio"] {
  opacity: 0.011;
  z-index: 100;
}

.menu input[type="radio"]:checked + label {
  border-bottom: 1px solid #2181ff;
  opacity: 1;
}

.menu input[type="radio"]:checked + label i {
  color: #2181ff;
}

.menu label {
  cursor: pointer;
  z-index: 90;
  font-size: 0.7rem;
  display: flex;
  justify-content: space-evenly;
  align-items: center;
}

.menu label:hover {
  opacity: 0.7;
}

.list {
  background: #211c3a;
  display: grid;
  grid-gap: 5px;
  padding: 5px 0;
  height: 180px;
  overflow-y: auto;
}

.list div[class^="item"] {
  display: flex;
  justify-content: space-between;
  background: #21223f;
  padding: 10px 0;
}

.list div[class^="section"] {
  font-size: 0.8rem;
  display: flex;
  align-items: center;
}

.list .icon {
  display: flex;
  align-items: center;
  margin-right: 10px;
}

.list .icon.up {
  color: #00ff00;
  transform: rotateZ(30deg);
}

.list .icon.down {
  color: #ff0000;
  transform: rotateZ(-150deg);
}

.list .description {
  color: #7d7d7d;
}

.list .signal {
  font-weight: bold;
}

.list .signal.positive {
  color: #00ff00;
}

.list .signal.negative {
  color: #ff0000;
}

</style>