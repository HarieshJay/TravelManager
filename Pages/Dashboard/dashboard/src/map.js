import React from "react";
import "./Styles.css";

class TomTomMap extends React.Component {
  constructor(props) {
    super(props);
    this.state = { lat: props.lat, long: props.long };

    navigator.geolocation.getCurrentPosition(function(pos) {
      const API_KEY = `${process.env.REACT_APP_TOMTOM_API_KEY}`;

      const script = document.createElement("script");
      script.src = process.env.PUBLIC_URL + "/sdk/tomtom.min.js";
      document.body.appendChild(script);
      script.async = true;
      script.onload = function() {
        window.tomtom.L.map("map", {
          source: "vector",
          key: API_KEY,
          center: [props.lat, props.long],
          basePath: "/sdk",
          zoom: 10
        });
      };
    });
  }

  render() {
    return <div id="map" className="shadow rounded" />;
  }
}

export default TomTomMap;
