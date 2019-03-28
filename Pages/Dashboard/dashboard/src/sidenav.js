// General Notes:

// Using states and lifecycle methods Configure sidenav to highlight the selected page

import React from "react";
import "./Styles.css";
import { BrowserRouter as Router, Route, Link } from "react-router-dom";
import AboutUs from "./aboutus";
import { notStrictEqual } from "assert";
import { METHODS } from "http";

// Side-nav tutorial https://bootstrapious.com/p/bootstrap-sidebar

class Nav extends React.Component {
  render() {
    return (
      <Router>
        <div>
          <div className="wrapper">
            <nav id="sidebar">
              <div className="sidebar-header">
                <h3>It Takes Two to Tango</h3>
              </div>

              <ul className="list-unstyled components">
                <p>Music is better with friends</p>

                <li>
                  <a
                    href="#pageSubmenu"
                    data-toggle="collapse"
                    aria-expanded="false"
                    className="dropdown-toggle"
                  >
                    Pages
                  </a>
                  <ul className="collapse list-unstyled" id="pageSubmenu">
                    <li>
                      <a href="#">Page 1</a>
                    </li>
                    <li>
                      <a href="#">Page 2</a>
                    </li>
                    <li>
                      <a href="#">Page 3</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="#">Contact Us</a>
                </li>
                <li>
                  <Link to="/AboutUs">About Tango</Link>
                </li>
              </ul>
            </nav>

            <div id="content" className="d-block">
              <nav className="navbar navbar-expand-lg navbar-light bg-light ">
                <div className="container-fluid">
                  <button
                    type="button"
                    id="sidebarCollapse"
                    className="navbar-btn"
                  >
                    <span />
                    <span />
                    <span />
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
                        <a className="nav-link" href="#">
                          Log out
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
              <Route exact path="/AboutUs" component={AboutUs} />
            </div>
          </div>
        </div>
      </Router>
    );
  }
}

export default Nav;
