@extends('layouts.admin')

@section('title', 'الرئيسية')

@push('css')
    <style>
        #chartdiv {
            width: 100%;
            height: 350px;
        }
    </style>
@endpush
<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->
<script>
    am5.ready(function() {

        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("chartdiv");

        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
            am5themes_Animated.new(root)
        ]);

        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
            panX: false,
            panY: false,
            wheelX: "none",
            wheelY: "none"
        }));

        // Add cursor
        // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
        cursor.lineY.set("visible", false);

        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xRenderer = am5xy.AxisRendererX.new(root, {
            minGridDistance: 30
        });

        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
            maxDeviation: 0,
            categoryField: "name",
            renderer: xRenderer,
            tooltip: am5.Tooltip.new(root, {})
        }));

        xRenderer.grid.template.set("visible", false);

        var yRenderer = am5xy.AxisRendererY.new(root, {});
        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            maxDeviation: 0,
            min: 0,
            extraMax: 0.1,
            renderer: yRenderer
        }));

        yRenderer.grid.template.setAll({
            strokeDasharray: [2, 2]
        });

        // Create series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
            name: "Series 1",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "value",
            sequencedInterpolation: true,
            categoryXField: "name",
            tooltip: am5.Tooltip.new(root, {
                dy: -25,
                labelText: "{valueY}"
            })
        }));


        series.columns.template.setAll({
            cornerRadiusTL: 5,
            cornerRadiusTR: 5,
            strokeOpacity: 0
        });

        series.columns.template.adapters.add("fill", (fill, target) => {
            return chart.get("colors").getIndex(series.columns.indexOf(target));
        });

        series.columns.template.adapters.add("stroke", (stroke, target) => {
            return chart.get("colors").getIndex(series.columns.indexOf(target));
        });

        // Set data
        var data = [{
                name: "طلبات التطوع",
                value: {{ App\Models\Volunteer::count() }},
                bulletSettings: {
                    // src: "https://www.amcharts.com/lib/images/faces/A04.png"
                }
            },
            {
                name: "طلبات بناء شركة",
                value: {{ App\Models\Company::count() }},
                bulletSettings: {
                    // src: "https://www.amcharts.com/lib/images/faces/C02.png"
                }
            },
            {
                name: "طلبات التوظيف",
                value: {{ App\Models\Job::count() }},
                bulletSettings: {
                    // src: "https://www.amcharts.com/lib/images/faces/D02.png"
                }
            }
        ];

        series.bullets.push(function() {
            return am5.Bullet.new(root, {
                locationY: 1,
                sprite: am5.Picture.new(root, {
                    templateField: "bulletSettings",
                    width: 50,
                    height: 50,
                    centerX: am5.p50,
                    centerY: am5.p50,
                    shadowColor: am5.color(0x000000),
                    shadowBlur: 4,
                    shadowOffsetX: 4,
                    shadowOffsetY: 4,
                    shadowOpacity: 0.6
                })
            });
        });

        xAxis.data.setAll(data);
        series.data.setAll(data);

        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        series.appear(1000);
        chart.appear(1000, 100);

    }); // end am5.ready()
</script>


@push('javascript')
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">بيئتي
        <!--begin::Separator-->
        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <!--end::Separator-->
        <!--begin::Description-->
        <small class="text-muted fs-7 fw-bold my-1 ms-1">احصائيات النظام</small>
        <!--end::Description-->
    </h1>
@endsection


@section('content')
    <div class="row g-5 g-xl-8">
        <div class="col-xl-3">
            <!--begin::Statistics Widget 5-->
            <a href="{{ route('news.index') }}" class="card hoverable card-xl-stretch mb-xl-8"
                style="background-color: #494b74">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                    <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                        <i class="fa-solid fa-newspaper"></i>
                    </span>
                    <!--end::Svg Icon-->
                    <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5">{{ App\Models\News::count() }}</div>
                    <div class="fw-bold text-gray-100">عدد الاخبار</div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>
        <div class="col-xl-3">
            <!--begin::Statistics Widget 5-->
            <a href="{{ route('donates.index') }}" class="card hoverable card-xl-stretch mb-xl-8"
                style="background-color: #86c127">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                    <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                    </span>
                    <!--end::Svg Icon-->
                    <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5">
                        {{ App\Models\Donate::where('status', 'paid')->count() }}</div>
                    <div class="fw-bold text-gray-100">عدد التبرعات الناجحة</div>
                    <span class="text-white op-7">{{ App\Models\Donate::where('status', 'paid')->sum('amount') }} $</span>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>
        <div class="col-xl-3">
            <!--begin::Statistics Widget 5-->
            <a href="{{ route('reports.index') }}" class="card hoverable card-xl-stretch mb-xl-8"
                style="background-color: #f7c300">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                        <i class="fas fa-file-alt"></i>
                    </span>
                    <!--end::Svg Icon-->
                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ App\Models\Report::count() }}</div>
                    <div class="fw-bold text-white">عدد التقارير</div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>
        <div class="col-xl-3">
            <!--begin::Statistics Widget 5-->
            <a href="{{ route('partners.index') }}" class="card hoverable card-xl-stretch mb-5 mb-xl-8"
                style="background-color: #009ef7">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotune/graphs/gra007.svg-->
                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                        <i class="fa-regular fa-handshake"></i>
                    </span>
                    <!--end::Svg Icon-->
                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ App\Models\Company::count() }}</div>
                    <div class="fw-bold text-white">عدد طلبات الشراكة</div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>
    </div>





<!-- HTML -->
<div id="chartdiv"></div>




@endsection
