import React from "react";
import "./Styles.css";
import Card from "./Card.js";
// Side-nav tutorial https://bootstrapious.com/p/bootstrap-sidebar

class FindBuddies extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      Names: [],
      Genres: [],
      Length: 0,
      Images: [],
      searchGenres: "",
      country: "",
      Ids: []
    };
  }

  componentDidMount() {
    this.search();
  }

  search = () => {
    var people;
    var search =
      "http://localhost/TangoWebsite/Tango/TangoWebsite/Pages/dashboard/src/Search.php?genres=" +
      this.state.searchGenres;
    console.log(search);
    fetch(search)
      .then(response => {
        return response.json();
      })
      .then(data => {
        people = data;
      })
      .then(() => {
        console.log(people);
        this.update(people);
      })
      .catch(err => {});
  };

  update = data => {
    var cards = "";
    var names = [];
    var genres = [];
    var img = [];
    var ids = [];

    for (var i = 0; i < data.people.length; i++) {
      names.push(data.people[i].person_name);
      genres.push(data.people[i].person_genre);
      img.push(data.people[i].person_image);
      ids.push(data.people[i].person_id);
    }

    this.setState({
      Names: names,
      Genres: genres,
      Length: data.people.length,
      Images: img,
      Ids: ids
    });
  };

  render() {
    let cardlist = [];
    var columns = this.state.Length / 3;

    for (var i = 0; i < columns; i++) {
      let p0 = 3 * i;
      let p1 = p0 + 1;
      let p2 = p0 + 2;

      cardlist.push(
        <div class="row w-100">
          <div class="col-sm-4 ">
            <Card
              name={this.state.Names[p0]}
              genre={this.state.Genres[p0]}
              image={this.state.Images[p0]}
              id={this.state.Ids[p0]}
            />
          </div>

          <div class="col-sm-4">
            <Card
              name={this.state.Names[p1]}
              genre={this.state.Genres[p1]}
              image={this.state.Images[p1]}
              id={this.state.Ids[p1]}
            />
          </div>
          <div class="col-sm-4">
            <Card
              name={this.state.Names[p2]}
              genre={this.state.Genres[p2]}
              image={this.state.Images[p2]}
              id={this.state.Ids[p2]}
            />
          </div>
        </div>
      );
    }

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
                  onClick={this.search}
                >
                  Search
                </button>
              </div>
            </div>
          </form>
        </div>

        {cardlist}
      </div>
    );
  }
}

export default FindBuddies;
