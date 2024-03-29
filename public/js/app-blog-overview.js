"use strict";
!(function (e) {
  e(document).ready(function () {
    e("#blog-overview-date-range").datepicker({});
    [
      {
        backgroundColor: "rgba(0, 184, 216, 0.1)",
        borderColor: "rgb(0, 184, 216)",
        data: [1, 2, 1, 3, 5, 4, 7],
      },
      {
        backgroundColor: "rgba(23,198,113,0.1)",
        borderColor: "rgb(23,198,113)",
        data: [1, 2, 3, 3, 3, 4, 4],
      },
      {
        backgroundColor: "rgba(255,180,0,0.1)",
        borderColor: "rgb(255,180,0)",
        data: [2, 3, 3, 3, 4, 3, 3],
      },
      {
        backgroundColor: "rgba(255,65,105,0.1)",
        borderColor: "rgb(255,65,105)",
        data: [1, 7, 1, 3, 1, 4, 8],
      },
      {
        backgroundColor: "rgb(0,123,255,0.1)",
        borderColor: "rgb(0,123,255)",
        data: [3, 2, 3, 2, 4, 5, 4],
      },
    ].map(function (e, o) {
      var a = {
          maintainAspectRatio: !0,
          responsive: !0,
          legend: { display: !1 },
          tooltips: { enabled: !1, custom: !1 },
          elements: { point: { radius: 0 }, line: { tension: 0.3 } },
          scales: {
            xAxes: [{ gridLines: !1, scaleLabel: !1, ticks: { display: !1 } }],
            yAxes: [
              {
                gridLines: !1,
                scaleLabel: !1,
                ticks: {
                  display: !1,
                  suggestedMax: Math.max.apply(Math, e.data) + 1,
                },
              },
            ],
          },
        },
        r = document.getElementsByClassName(
          "blog-overview-stats-small-" + (o + 1)
        );
      new Chart(r, {
        type: "line",
        data: {
          labels: [
            "Label 1",
            "Label 2",
            "Label 3",
            "Label 4",
            "Label 5",
            "Label 6",
            "Label 7",
          ],
          datasets: [
            {
              label: "Today",
              fill: "start",
              data: e.data,
              backgroundColor: e.backgroundColor,
              borderColor: e.borderColor,
              borderWidth: 1.5,
            },
          ],
        },
        options: a,
      });
    });
    var o = document.getElementsByClassName("blog-overview-users")[0],
      a = {
        labels: Array.from(new Array(30), function (e, o) {
          return 0 === o ? 1 : o;
        }),
        datasets: [
          {
            label: "Current Month",
            fill: "start",
            data: [
              500,
              800,
              320,
              180,
              240,
              320,
              230,
              650,
              590,
              1200,
              750,
              940,
              1420,
              1200,
              960,
              1450,
              1820,
              2800,
              2102,
              1920,
              3920,
              3202,
              3140,
              2800,
              3200,
              3200,
              3400,
              2910,
              3100,
              4250,
            ],
            backgroundColor: "rgba(0,123,255,0.1)",
            borderColor: "rgba(0,123,255,1)",
            pointBackgroundColor: "#ffffff",
            pointHoverBackgroundColor: "rgb(0,123,255)",
            borderWidth: 1.5,
            pointRadius: 0,
            pointHoverRadius: 3,
          },
          {
            label: "Past Month",
            fill: "start",
            data: [
              380,
              430,
              120,
              230,
              410,
              740,
              472,
              219,
              391,
              229,
              400,
              203,
              301,
              380,
              291,
              620,
              700,
              300,
              630,
              402,
              320,
              380,
              289,
              410,
              300,
              530,
              630,
              720,
              780,
              1200,
            ],
            backgroundColor: "rgba(255,65,105,0.1)",
            borderColor: "rgba(255,65,105,1)",
            pointBackgroundColor: "#ffffff",
            pointHoverBackgroundColor: "rgba(255,65,105,1)",
            borderDash: [3, 3],
            borderWidth: 1,
            pointRadius: 0,
            pointHoverRadius: 2,
            pointBorderColor: "rgba(255,65,105,1)",
          },
        ],
      };
    window.BlogOverviewUsers = new Chart(o, {
      type: "LineWithLine",
      data: a,
      options: {
        responsive: !0,
        legend: { position: "top" },
        elements: { line: { tension: 0.3 }, point: { radius: 0 } },
        scales: {
          xAxes: [
            {
              gridLines: !1,
              ticks: {
                callback: function (e, o) {
                  return o % 7 != 0 ? "" : e;
                },
              },
            },
          ],
          yAxes: [
            {
              ticks: {
                suggestedMax: 45,
                callback: function (e, o, a) {
                  return 0 === e ? e : e > 999 ? (e / 1e3).toFixed(1) + "K" : e;
                },
              },
            },
          ],
        },
        hover: { mode: "nearest", intersect: !1 },
        tooltips: { custom: !1, mode: "nearest", intersect: !1 },
      },
    });
    var r = BlogOverviewUsers.getDatasetMeta(0);
    (r.data[0]._model.radius = 0),
      (r.data[a.datasets[0].data.length - 1]._model.radius = 0),
      window.BlogOverviewUsers.render();
    var t = document.getElementsByClassName("blog-users-by-device")[0];
    window.ubdChart = new Chart(t, {
      type: "pie",
      data: {
        datasets: [
          {
            hoverBorderColor: "#ffffff",
            data: [68.3, 24.2, 7.5],
            backgroundColor: [
              "rgba(0,123,255,0.9)",
              "rgba(0,123,255,0.5)",
              "rgba(0,123,255,0.3)",
            ],
          },
        ],
        labels: ["Desktop", "Tablet", "Mobile"],
      },
      options: {
        legend: { position: "bottom", labels: { padding: 25, boxWidth: 20 } },
        cutoutPercentage: 0,
        tooltips: { custom: !1, mode: "index", position: "nearest" },
      },
    });
  });
})(jQuery);
