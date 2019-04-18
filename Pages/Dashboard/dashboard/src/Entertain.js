import React from "react";
import "./Styles.css";
import Card from "./Card.js";
// Side-nav tutorial https://bootstrapious.com/p/bootstrap-sidebar

class Entertain extends React.Component {
  constructor(props) {
    super(props);
    this.state = {};
  }

  render() {
    return (
      <div className="column-fill text-center container w-100">
        <h1>Find Friends</h1>
        <div className="row">
          <form className="w-100 mt-5 mb-5">
            <div class="input-group">
              <input
                type="text"
                onChange={event => {
                  this.state.searchGenres = event.target.value;
                  console.log(this.state.searchGenres);
                  console.log(
                    "http://localhost/TangoWebsite/Tango/TangoWebsite/Pages/dashboard/src/Search.php?genres=" +
                      this.state.searchGenres
                  );
                }}
                class="form-control"
                placeholder="Enter Genres.."
                aria-describedby="basic-addon2"
              />

              <div class="input-group-append">
                <button
                  class="btn btn-outline-secondary"
                  type="submit"
                  value="Submit"
                >
                  Search
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    );
  }
}

export default Entertain;
