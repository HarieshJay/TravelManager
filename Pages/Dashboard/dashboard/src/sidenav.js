// General Notes:

// Using states and lifecycle methods Configure sidenav to highlight the selected page

import React from "react";
import "./Styles.css";
import { HashRouter as Router, Route, Link } from "react-router-dom";
import AboutUs from "./aboutus";
import Friends from "./Friends";
import Entertain from "./Entertain";
import { notStrictEqual } from "assert";
import { METHODS } from "http";

// Side-nav tutorial https://bootstrapious.com/p/bootstrap-sidebar

class Nav extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      PlanNames: []
    };
  }

  componentDidMount() {
    this.search();
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
        this.update(plans);
      })
      .catch(err => {
        alert(err);
      });
  };

  update = info => {
    var plans = [];
    for (var i = 0; i < info.plans.length; i++) {
      plans.push(info.plans[i].plan_name);
    }

    this.setState({ PlanNames: plans });
  };

  render() {
    let planList = [];
    for (var i = 0; i < this.state.PlanNames.length; i++) {
      planList.push(
        <li>
          <Link to="/Friends">{this.state.PlanNames[i]}</Link>
        </li>
      );
    }
    return (
      <Router>
        <div>
          <div className="wrapper">
            <nav id="sidebar">
              <div className="sidebar-header">
                <h1>Travel Manager</h1>
              </div>

              <ul className="list-unstyled components">
                <li>
                  <a
                    href="#pageSubmenu"
                    data-toggle="collapse"
                    aria-expanded="false"
                    className="dropdown-toggle"
                  >
                    Let's Tango
                  </a>

                  <ul className="collapse list-unstyled" id="pageSubmenu">
                    <li>
                      <Link to="/Friends">I need a concert buddy</Link>
                    </li>
                  </ul>
                </li>
                <li>
                  <a
                    href="#planSubmenu"
                    data-toggle="collapse"
                    aria-expanded="false"
                    className="dropdown-toggle"
                  >
                    Plans
                  </a>

                  <ul className="collapse list-unstyled" id="planSubmenu">
                    {planList}
                  </ul>
                </li>
                <div className="text-center">
                  <button
                    type="button"
                    className="btn btn-dark btn-lg navbar-btn"
                  >
                    Create Plan
                  </button>
                </div>
              </ul>
            </nav>

            <div id="content" className="d-block">
              <nav className="navbar navbar-expand-lg navbar-light bg-light top-navbar ">
                <div className="container-fluid">
                  <button
                    type="button"
                    id="sidebarCollapse"
                    className="btn btn-info"
                  >
                    <i className="fas fa-align-left" />
                    <span>Toggle Sidebar</span>
                  </button>
                  <button
                    className="btn btn-dark d-inline-block d-lg-none ml-auto"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                  >
                    <i className="fas fa-align-justify" />
                  </button>

                  <div
                    className="collapse navbar-collapse"
                    id="navbarSupportedContent"
                  >
                    <ul className="nav navbar-nav ml-auto">
                      <li className="nav-item active">
                        <a
                          id="logout"
                          className="nav-link"
                          href="../../index.php"
                        >
                          Log out
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>

              <Route path="/Friends" component={Friends} />
            </div>
          </div>
        </div>
      </Router>
    );
  }
}

export default Nav;
