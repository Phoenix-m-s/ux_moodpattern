<?php
$titles = [
    "محبت",
    "عشق",
    "دوستی",
    "آرامش",
    "آرزو",
    "شوق",
    "غم",
    "شادی",
    "احساس",
    "احترام",
    "زیبایی",
    "آسایش",
    "همدلی",
    "رمانتیسم",
    "حنان",
    "الفت",
    "همنشینی",
    "سعادت",
    "اراده",
    "اشتیاق",
    "تعلق",
    "سیرت",
    "رفاقت",
    "همبستگی",
    "معنویت",
    "یاری",
    "آشتی",
    "خواب",
    "وصال",
    "تفریح",
    "شیفتگی",
    "یگانگی",
    "عاشقی",
    "تمایل",
    "همدلانه",
    "صمیمیت",
    "شادمانی",
    "معصومیت",
    "هوس",
    "هیجان",
    "وابستگی",
    "منفعت",
    "التفات",
    "دلبستگی",
    "پایبندی",
    "عاطفت",
    "پیمان",
    "محبوبیت",
    "غرامت",
    "مدد"
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D3.js Circles</title>
    <meta charset="UTF-8">
    <title>moodPattern</title>
    <!-- fav icon -->
    <link rel="shortcut icon" href="assets/images/logo.svg">
    <!-- css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/d3.v7.min.js"></script>
    <style>
        .tooltip {
            position: absolute;
            text-align: center;
            width: 80px;
            height: 28px;
            padding: 2px;
            font: 12px sans-serif;
            background: lightsteelblue;
            border: 0;
            border-radius: 8px;
            pointer-events: none;
            opacity: 0;
        }

        .oval-shape {
            width: 240px;
            height: 240px;
            margin: 65px auto 0;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            overflow: hidden; /* جلوگیری از نمایش ات لاین بیرون از دایره */
            background-color: #FFFFFF; /* بک‌گراند سفید */
            box-shadow: 0 0 0 10px #77deae; /* ات لاین */
            direction: rtl;
            text-align: center;
        }
        #centerCircle {
            width: 200px; /* اندازه دلخواه */
            height: 200px; /* اندازه دلخواه */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index:9999;
        }

        #my_dataviz svg {
            opacity: 0.9; /* برای مثال، تنظیم شفافیت به 0.7 */
        }

        .selected circle {
            stroke: red; /* رنگ حاشیه دایره */
            stroke-width: 3; /* عرض حاشیه دایره */
        }

    </style>
</head>
<body>
<header class="header mb-5">
    <nav class="navbar navbar-expand-lg bg-body-tertiary " dir="rtl">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="assets/images/logoSVG.svg" alt="moodpattern" title="moodpattern">
            </a>
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">صفحه اصلی</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">فلسفه گراف حسی</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">لیست گراف حسی</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">تماس با ما</a>
                </li>
            </ul>
            <div class="col-md-3">
                <form>
                    <div class="search-container">
                        <div class="search-input">
                            <input class="form-control rounded-4" data-size="sm" data-color="background"
                                   data-has-icon="" data-arrow-focusable="" tabindex="0" placeholder="جست&zwnj;وجو "
                                   value="">
                            <svg width="25" height="25" class="SearchInput__icon" viewBox="0 0 30 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g id="search">
                                    <path id="magnifying-glass(1) 1 (Traced)" fill-rule="evenodd" clip-rule="evenodd"
                                          d="M7.08808 2.0311C5.74216 2.21561 4.61114 2.62715 3.58646 3.3052C1.74838 4.52148 0.559377 6.2871 0.122062 8.44975C-0.0406873 9.25444 -0.0406873 10.574 0.122062 11.3787C0.282272 12.171 0.490063 12.7724 0.843998 13.4684C2.38328 16.495 5.68402 18.2207 9.08098 17.775C10.3511 17.6083 11.6835 17.0968 12.64 16.4086L12.8856 16.2319L14.6966 18.0138C16.5743 19.8612 16.7417 19.9975 17.1366 20C17.7543 20.0039 18.2625 19.5029 18.2585 18.894C18.256 18.5048 18.1175 18.3395 16.2471 16.492L14.443 14.71L14.7567 14.2394C16.1953 12.0815 16.4716 9.34475 15.4923 6.95063C14.4612 4.43007 12.1574 2.588 9.42461 2.09918C8.90955 2.00707 7.55205 1.96747 7.08808 2.0311ZM9.04584 4.20936C10.259 4.4179 11.2797 4.94678 12.1705 5.82826C12.699 6.35128 12.9848 6.73613 13.2855 7.32948C14.0829 8.90298 14.1006 10.8307 13.3322 12.4204C12.7816 13.5595 11.6971 14.6161 10.5073 15.1727C9.06387 15.8479 7.20939 15.871 5.68549 15.2327C4.47693 14.7265 3.29534 13.6049 2.7228 12.4204C1.9544 10.8307 1.97212 8.90298 2.76946 7.32948C3.06998 6.73648 3.35587 6.35148 3.88454 5.82771C4.80842 4.91249 5.89409 4.3748 7.24042 4.16576C7.57526 4.1138 8.63925 4.13948 9.04584 4.20936Z"
                                          fill="#D2D2D2"/>
                                    <line id="Line 58" y1="-0.5" x2="20" y2="-0.5" transform="matrix(0 1 1 0 29.4165 0)"
                                          stroke="#D2D2D2"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                </form>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <img class="text-success" src="assets/images/user.svg" alt="moodpattern"
                                 title="moodpattern">
                            ورود</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ثبت نام</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <button class="btn btn-outline-success rounded-5 " type="submit">تماس با مشاوران</button>
                </form>
            </div>
        </div>
    </nav>
</header>
<div class="container">
    <div class="col-md-8 mx-auto my-auto">

        <div class="oval-shape" id="centerCircle">
            <!-- Your content goes here -->
            <p>رابطه ما با همه از نظر من احساسات برای من یعنی</p>
        </div>


        <div id="my_dataviz">

        </div>
    </div>
</div>
<div class="col-md-8 col-xl-8 center-mobile mx-auto my-auto mt-5">
    <div class="card bg-body-tertiary">
        <div class="card-header text-center">
            <h6>اطلاعات دایره‌های انتخاب شده:</h6>
        </div>
        <div class="card-body" dir="rtl">
            <ul class="list-group">
                <div id="selectedCirclesInfo">

                    <ul id="selectedCirclesList">
                        <div id="data"></div>
                    </ul>
                </div>
            </ul>
        </div>

        <div class="card-footer float-end">
            <button class="btn btn-success rounded-5 " id="submit-btn" onclick="submitData()">ارسال</button>
        </div>
    </div>
</div>

<!--footer-->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <img src="assets/images/logo.svg" alt="moodpattern" title="moodpattern">

                <img src="assets/images/textLogo.svg" alt="moodpattern" title="moodpattern">

                <!-- نقشه گوگل -->
                <!-- اضافه کردن نقشه از گوگل با استفاده از کد Embed شده -->
                <iframe class="mt-2"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25897.79347643372!2d51.391414399999995!3d35.76986905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e06f8e6ad6b4b%3A0x4fde4f4d6ca30e47!2sVanak%2C%20District%203%2C%20Tehran%2C%20Tehran%20Province%2C%20Iran!5e0!3m2!1sen!2snl!4v1702829771308!5m2!1sen!2snl"
                        width="500" height="150" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                <ul class="list-unstyled text-white" dir="ltr">
                    <li>
                        <img src="assets/images/instagram.svg" alt="moodpattern" title="moodpattern">
                        <img src="assets/images/instagram.svg" alt="moodpattern" title="moodpattern">
                        <img src="assets/images/instagram.svg" alt="moodpattern" title="moodpattern">
                        <img src="assets/images/instagram.svg" alt="moodpattern" title="moodpattern">

                    </li>
                </ul>
            </div>
            <div class="col-md-6 mt-5" dir="rtl">
                <!-- اطلاعات تماس -->
                <h5 class="text-white">اطلاعات تماس</h5>
                <ul class="list-unstyled text-white">
                    <li>
                        <img src="assets/images/map.svg" alt="moodpattern" title="moodpattern">
                        شعبه 1: خیابان پیروزی نرسیده به چهار راه گوگا گولا روبروی گوچه جعفر نژاد جنب کافی شاپ دیدار
                        بالای داروحانه شبانه روزی طبقه دوم
                    </li>
                </ul>
                <h5 class="text-white">تلفن</h5>
                <ul class="list-unstyled text-white" dir="rtl">
                    <li>
                        <img src="assets/images/call.svg" alt="moodpattern" title="moodpattern">
                        021-36601073
                        <img src="assets/images/call.svg" alt="moodpattern" title="moodpattern">
                        021-36601073
                        <img src="assets/images/call.svg" alt="moodpattern" title="moodpattern">
                        021-36601073
                    </li>
                </ul>
                <!-- اطلاعات تماس -->
                <h5 class="text-white">ایمیل :</h5>
                <ul class="list-unstyled text-white">
                    <li>
                        <img src="assets/images/email.svg" alt="moodpattern" title="moodpattern">
                        INFO@GRAFHESI.COM
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--copyRight-->
    <div class="copyRight"></div>
</footer>
</body>
<!--js-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<!-- Script -->
<script>
    // تنظیم ابعاد SVG
    const width = 1000;
    const height = 800;

    // append the svg object to the body of the page
    const svg = d3.select("#my_dataviz")
        .append("svg")
        .attr("width", width)
        .attr("height", height);

    // Data for circles
    const data = Array.from({
        length: 50
    }, (_, i) => ({
        region: "Region " + (i + 1),
        value: Math.floor(Math.random() * 1000000000)
    }));
    const titles = <?php echo json_encode($titles);?>;
  /*  // Titles for circles
    const titles = [
        "محبت",
        "عشق",
        "دوستی",
        "آرامش",
        "آرزو",
        "شوق",
        "غم",
        "شادی",
        "احساس",
        "احترام",
        "زیبایی",
        "آسایش",
        "همدلی",
        "رمانتیسم",
        "حنان",
        "الفت",
        "همنشینی",
        "سعادت",
        "اراده",
        "اشتیاق",
        "تعلق",
        "سیرت",
        "رفاقت",
        "همبستگی",
        "معنویت",
        "یاری",
        "آشتی",
        "خواب",
        "وصال",
        "تفریح",
        "شیفتگی",
        "یگانگی",
        "عاشقی",
        "تمایل",
        "همدلانه",
        "صمیمیت",
        "شادمانی",
        "معصومیت",
        "هوس",
        "هیجان",
        "وابستگی",
        "منفعت",
        "التفات",
        "دلبستگی",
        "پایبندی",
        "عاطفت",
        "پیمان",
        "محبوبیت",
        "غرامت",
        "مدد"
    ];*/

    // Color scale for circles
    const color = d3.scaleOrdinal()
        .domain(titles)
        .range(d3.schemeCategory10);

    // Size scale for circles
    const size = d3.scaleLinear()
        .domain(d3.extent(data, d => d.value))
        .range([40, 40]);

    // create a tooltip
    const Tooltip = d3.select("#my_dataviz")
        .append("div")
        .style("opacity", 0)
        .attr("class", "tooltip");

    // Initialize click counter
    let clickCount = 0;

    // Initialize data array for clicks
    let clickData = [];

    // Initialize the circles
    const node = svg.selectAll(".node")
        .data(data)
        .enter()
        .append("g")
        .attr("class", "node")
        .attr("transform", (d, i) => "translate(" + (50 + i * 20) + "," + height / 2 + ")")
        .on("mouseover", function (event, d) {
            Tooltip.style("opacity", 1)
                .html('<u>' + d.region + '</u>' + "<br>" + d.value + " inhabitants")
                .style("left", (event.pageX) + "px")
                .style("top", (event.pageY - 28) + "px");
        })
        .on("mouseleave", function () {
            Tooltip.style("opacity", 0);
        })
        .on("click", clicked)
        .call(d3.drag()
            .on("start", dragstarted)
            .on("drag", dragged)
            .on("end", dragended));

    // Append circles to each group
    node.append("circle")
        .attr("r", d => size(d.value))
        .style("fill", (d, i) => color(titles[i]))
        .attr("stroke", "black")
        .style("stroke-width", 1);

    // Append text to each group
    node.append("text")
        .attr("text-anchor", "middle")
        .attr("dominant-baseline", "middle")
        .text((d, i) => titles[i]);

    // Features of the forces applied to the nodes:
    const simulation = d3.forceSimulation()
        .force("center", d3.forceCenter().x(width / 2).y(height / 2)) // Attraction to the center of the svg area
        .force("charge", d3.forceManyBody().strength(.1)) // Nodes are attracted to each other if value is > 0
        .force("collide", d3.forceCollide().strength(.2).radius(function (d) {
            return (size(d.value) + 3);
        }).iterations(1)) // Force that avoids circle overlapping;

    // Apply these forces to the nodes and update their positions.
    simulation
        .nodes(data)
        .on("tick", function (d) {
            node.attr("transform", d => "translate(" + d.x + "," + d.y + ")");
        });

    // تعریف متغیر circleData
    let circleData = [];

    // تابع clicked باید به این صورت باشد
    function clicked(event, d) {
        const clickedNode = d3.select(this);
        const circle = clickedNode.select("circle");
        const text = clickedNode.select("text");

        let circleSize = parseFloat(circle.attr("r"));

        if (clickCount % 6 < 3) {
            circleSize += 10; // Increase size
        } else {
            circleSize -= 10; // Decrease size
        }

        circleSize = Math.max(40, circleSize);

        if (circleSize === 40 && clickCount % 6 !== 0) {
            circleSize = 50;
        }

        circle.transition()
            .duration(500)
            .attr("r", circleSize);

        text.attr("transform", "translate(0," + (-40) + ")");

        // چک کردن اینکه آیا دایره مورد نظر در circleData وجود دارد یا خیر
        const dataIndex = circleData.findIndex(item => item.title === text.text());
        if (dataIndex !== -1) {
            // اگر دایره در circleData وجود دارد، تعداد کلیک‌ها آن را افزایش می‌دهیم
            circleData[dataIndex].clicks++;
        } else {
            // اگر دایره در circleData وجود ندارد، آن را به circleData اضافه می‌کنیم
            circleData.push({ title: text.text(), clicks: 1 });
        }

        clickCount++;
    }
    // تابع ارسال داده
    function submitData() {
        const dataDiv = document.getElementById("data");
        dataDiv.innerHTML = "";
        circleData.forEach((item, index) => {
            dataDiv.innerHTML += item.title + ": " + item.clicks + "<br>";
        });
    }

    // زمانی که دکمه ارسال کلیک می‌شود
    document.getElementById("submit-btn").addEventListener("click", function() {
        // پیدا کردن دایره‌ای که کاربر روی آن کلیک کرده است
        const selectedCircle = d3.select(".selected circle");

        // بررسی اینکه آیا دایره‌ای کلیک شده است یا خیر
        if (!selectedCircle.empty()) {
            // گرفتن عنوان و تعداد کلیک دایره‌ای که کاربر روی آن کلیک کرده است
            const title = selectedCircle.node().parentNode.querySelector("text").textContent;
            const clicks = parseInt(selectedCircle.attr("data-clicks"));

            // اضافه کردن اطلاعات دایره‌ای که کاربر روی آن کلیک کرده است به محتوای صفحه
            const infoDiv = document.getElementById("selectedCirclesList");
            infoDiv.innerHTML = "<li>" + title + ": " + clicks + "</li>";
        }
    });






    // What happens when a circle is dragged?
    function dragstarted(event, d) {
        if (!event.active) simulation.alphaTarget(.03).restart();
        d.fx = d.x;
        d.fy = d.y;
    }

    function dragged(event, d) {
        d.fx = event.x;
        d.fy = event.y;
    }

    function dragended(event, d) {
        if (!event.active) simulation.alphaTarget(.03);
        d.fx = null;
        d.fy = null;
    }

</script>
</html>

