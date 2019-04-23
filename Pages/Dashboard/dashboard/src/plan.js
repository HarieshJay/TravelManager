import React from "react";
import "./Styles.css";
import TomTomMap from "./map";
import Tasks from "./Tasks";

class Plan extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      plan_id: props.match.params.plan_id,
      plan_name: props.match.params.plan_name,
      PlanInfo: {},
      lat: 0,
      long: 0
    };
    this.dateinfo = "";
  }

  componentDidMount() {
    this.search();
  }

  componentDidUpdate(prevProps) {
    if (prevProps.match.params.plan_id !== this.props.match.params.plan_id) {
      this.setState({
        plan_name: this.props.match.params.plan_name,
        plan_id: this.props.match.params.plan_id
      });
      this.search();
      console.log("update");
    }
  }

  search = () => {
    var plans;
    var search =
      "http://localhost/TravelManager/Scripts/PHP_REST_API/api/plan/read.php";
    fetch(search, {
      credentials: "same-origin"
    })
      .then(response => {
        return response.json();
      })
      .then(data => {
        plans = data;
      })
      .then(() => {
        if (typeof plans != "undefined") {
          this.update(plans);
        }
      })
      .catch(err => {
        alert(err);
      });
  };

  update = info => {
    if (typeof info != "undefined") {
      for (var i = 0; i < info.plans.length; i++) {
        if (info.plans[i].plan_name === this.state.plan_name) {
          this.setState({ PlanInfo: info.plans[i] });
        }
      }

      if (
        this.state.PlanInfo.date_end !== "" ||
        this.state.PlanInfo.date_end !== ""
      ) {
        this.dateinfo =
          this.state.PlanInfo.date_start + " — " + this.state.PlanInfo.date_end;
      } else {
        this.dateinfo = "No Date Specified";
      }
    }
  };
  render() {
    var long;
    var lat;
    if (this.state.plan_id === 26) {
      // Boston
      lat = 42.361145;
      long = -71.057083;
      // this.setState({ lat: 43.6532, long: 79.3832 });
    } else if (this.state.plan_id === 27) {
      //Toronto
      // this.setState({ lat: 43.6532, long: 79.3832 });
      lat = 40.7648;
      long = -73.9808;
    } else if (this.state.plan_id === 28) {
      //New York
      // this.state.lat = 40.7128;
      // this.state.long = 74.006;
      // this.setState({ lat: 43.6532, long: 79.3832 });
      lat = 40.7128;
      long = -74.006;
    } else {
      //Chicago
      // this.state.lat = 41.8781;
      // this.state.long = 87.6298;
      // this.setState({ lat: 43.6532, long: 79.3832 });
      lat = 41.8781;
      long = -87.6298;
    }
    console.log(this.state);
    return (
      <div>
        <div className="row shadows">
          <div className="col-6">
            <div class="jumbotron shadow h-100">
              <h1 class="display-4">{this.state.PlanInfo.plan_name}</h1>
              <p class="lead">{this.dateinfo}</p>
              <hr class="my-4" />
              <p class="lead">
                <a class="btn btn-danger btn-lg" href="#" role="button">
                  Delete Plan
                </a>
                <a
                  class=" ml-3 btn btn-secondary btn-lg"
                  href="#"
                  role="button"
                >
                  Update Info
                </a>
              </p>
            </div>
          </div>
          <div className="col-6">
            <div class="jumbotron h-100 bg-light shadow">
              <iframe
                id="forecast_embed"
                frameborder="0"
                height="245"
                width="100%"
                src="//forecast.io/embed/#lat=42.3583&lon=-71.0603&name=your Area&color=#00aaff&font=Georgia&units=uk"
              />
            </div>
            <div />
          </div>
        </div>
        <div className="row mt-3">
          <div className="col-4">
            <TomTomMap lat={lat} long={long} />
          </div>

          <div className="col-8">
            <Tasks plan_id={this.state.plan_id} />
          </div>
        </div>
      </div>
    );
  }
}

export default Plan;
