import React from "react";
import ReactDOM from "react-dom";
import faker from "faker";
import "./Styles.css";

class Card extends React.Component {
  render() {
    let img;
    let name;
    let code;

    if (!this.props.image) {
      img = faker.image.avatar();
    } else {
      img = this.props.image;
    }

    if (!this.props.name) {
      name = faker.name.findName();
    } else {
      name = this.props.name;
    }

    if (!this.props.id) {
      code = faker.address.zipCode();
    } else {
      code = this.props.id;
    }

    if (!this.props.id) {
      return null;
    } else {
      return (
        <div class="card mt-5 shadow-lg">
          <div class="card-body">
            <img class="card-img-top" src={img} alt="Card image cap" />
            <h5 class="card-title">
              <b className="m-3"> {name}</b>
            </h5>
            <b className="m-3"> {this.props.genre}</b>
            <p class="card-text">{code}</p>
          </div>
        </div>
      );
    }
  }
}

export default Card;
