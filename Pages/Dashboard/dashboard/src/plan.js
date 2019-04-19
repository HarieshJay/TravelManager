import React from "react";
import "./Styles.css";
import TomTomMap from "./map";

class Plan extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      plan_name: props.match.params.id,
      PlanInfo: {}
    };
    this.dateinfo = "";
  }

  componentDidMount() {
    this.search();
  }

  componentDidUpdate(prevProps) {
    if (prevProps.match.params.id !== this.props.match.params.id) {
      this.setState({ plan_name: this.props.match.params.id });
      this.search();
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
          console.log(this.state.PlanInfo);
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
    return (
      <div>
        <div className="row">
          <div className="col-12">
            <div class="jumbotron ">
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
        </div>
        <div className="row">
          <div className="col-5">
            <TomTomMap />
          </div>
        </div>
      </div>
    );
  }
}

export default Plan;
