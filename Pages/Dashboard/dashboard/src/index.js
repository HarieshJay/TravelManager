import React from "react";
import ReactDOM from "react-dom";
import Nav from "./sidenav";
import { BrowserRouter as Router, Route, Link } from "react-router-dom";

class App extends React.Component {
  render() {
    return (
      // <Router>
      //   <div>
      //     <ul>
      //       <li>
      //         <Link to="/"> Home </Link>
      //       </li>
      //       <li>
      //         <Link to="/about"> About </Link>
      //       </li>
      //       <li>
      //         <Link to="/team"> Team </Link>
      //       </li>
      //     </ul>
      //     <Route exact path="/" component={Nav} />
      //     <Route exact path='/about' component={AboutComponent}></Route>
      //       <Route exact path='/team' component={TeamComponent}></Route>
      //   </div>
      // </Router>
      <div>
        <Nav />
      </div>
    );
  }
}

ReactDOM.render(<App />, document.querySelector("#root"));
