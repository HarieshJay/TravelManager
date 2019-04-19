import React from "react";
import "./Styles.css";

class TomTomMap extends React.Component {
  componentDidMount() {
    let lat;
    let long;
    navigator.geolocation.getCurrentPosition(function(pos) {
      lat = pos.coords.latitude;
      long = pos.coords.longitude;
    });
    const API_KEY = `${process.env.REACT_APP_TOMTOM_API_KEY}`;

    const script = document.createElement("script");
    script.src = process.env.PUBLIC_URL + "/sdk/tomtom.min.js";
    document.body.appendChild(script);
    script.async = true;
    script.onload = function() {
      window.tomtom.L.map("map", {
        source: "vector",
        key: API_KEY,
        center: [lat, long],
        basePath: "/sdk",
        zoom: 15
      });
    };
  }

  render() {
    return <div id="map" className="shadow rounded" />;
  }
}

export default TomTomMap;
