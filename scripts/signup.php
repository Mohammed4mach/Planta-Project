<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planta - Signup</title>
    <link rel='stylesheet' href="../stylesheets/main.css">
    <link rel="stylesheet" href="../remixIcons/remixicon.css">
    <link rel="stylesheet" href="../stylesheets/signin.css">
    <link rel='stylesheet' href='../fontawesome/css/all.min.css'>
</head>
<body>
    <?php 
        require_once("header.php");
    ?>

    <div class="login-form-container">
        <form action="signin.php" method="post">
            <h3> Sign up </h3>
            <div>
                <span>Email</span>
                <input type="email" name="email"  class="box" placeholder="Enter your email ">
            </div>
            <div>
                <span>Password</span>
                <input type="password" name="password"  class="box" placeholder="Enter your password "><br><br>
                <input type="text" name="" id="" class="box" placeholder="Confirm your password">
            </div>
            <div>
                <span>Date of birth</span>
                <!-- date of birth -->
                <div class="birthDate">
                    <select name="birthDateDay">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                    <select name="birthDateMonth">
                        <option value="1">Jan</option>
                        <option value="1">Feb</option>
                        <option value="1">Mar</option>
                        <option value="1">Apr</option>
                        <option value="1">May</option>
                        <option value="1">Jun</option>
                        <option value="1">Jul</option>
                        <option value="1">Sep</option>
                        <option value="1">Oct</option>
                        <option value="1">Nov</option>
                        <option value="1">Dec</option>
                    </select>
                    <select name="birthDateYear">
                        <option value="1">1905</option>
                        <option value="2">1906</option>
                        <option value="3">1907</option>
                        <option value="4">1908</option>
                        <option value="5">1909</option>
                        <option value="6">1910</option>
                        <option value="7">1911</option>
                        <option value="8">1912</option>
                        <option value="9">1913</option>
                        <option value="10">1914</option>
                        <option value="11">1915</option>
                        <option value="12">1916</option>
                        <option value="13">1917</option>
                        <option value="14">1918</option>
                        <option value="15">1919</option>
                        <option value="16">1920</option>
                        <option value="17">1921</option>
                        <option value="18">1922</option>
                        <option value="19">1923</option>
                        <option value="20">1924</option>
                        <option value="21">1925</option>
                        <option value="22">1926</option>
                        <option value="23">1927</option>
                        <option value="24">1928</option>
                        <option value="25">1929</option>
                        <option value="26">1930</option>
                        <option value="27">1931</option>
                        <option value="28">1932</option>
                        <option value="29">1933</option>
                        <option value="30">1934</option>
                        <option value="31">1935</option>
                        <option value="32">1936</option>
                        <option value="33">1937</option>
                        <option value="34">1938</option>
                        <option value="35">1939</option>
                        <option value="36">1940</option>
                        <option value="37">1941</option>
                        <option value="38">1942</option>
                        <option value="39">1943</option>
                        <option value="40">1944</option>
                        <option value="41">1945</option>
                        <option value="42">1946</option>
                        <option value="43">1947</option>
                        <option value="44">1948</option>
                        <option value="45">1949</option>
                        <option value="46">1950</option>
                        <option value="47">1951</option>
                        <option value="48">1952</option>
                        <option value="49">1953</option>
                        <option value="50">1954</option>
                        <option value="51">1955</option>
                        <option value="52">1956</option>
                        <option value="53">1957</option>
                        <option value="54">1958</option>
                        <option value="55">1959</option>
                        <option value="56">1960</option>
                        <option value="57">1961</option>
                        <option value="58">1962</option>
                        <option value="59">1963</option>
                        <option value="60">1964</option>
                        <option value="61">1965</option>
                        <option value="62">1966</option>
                        <option value="63">1967</option>
                        <option value="64">1968</option>
                        <option value="65">1969</option>
                        <option value="66">1970</option>
                        <option value="67">1971</option>
                        <option value="68">1972</option>
                        <option value="69">1973</option>
                        <option value="70">1974</option>
                        <option value="71">1975</option>
                        <option value="72">1976</option>
                        <option value="73">1977</option>
                        <option value="74">1978</option>
                        <option value="75">1979</option>
                        <option value="76">1980</option>
                        <option value="77">1981</option>
                        <option value="78">1982</option>
                        <option value="79">1983</option>
                        <option value="80">1984</option>
                        <option value="81">1985</option>
                        <option value="82">1986</option>
                        <option value="83">1987</option>
                        <option value="84">1988</option>
                        <option value="85">1989</option>
                        <option value="86">1990</option>
                        <option value="87">1991</option>
                        <option value="88">1992</option>
                        <option value="89">1993</option>
                        <option value="90">1994</option>
                        <option value="91">1995</option>
                        <option value="92">1996</option>
                        <option value="93">1997</option>
                        <option value="94">1998</option>
                        <option value="95">1999</option>
                        <option value="96">2000</option>
                        <option value="97">2001</option>
                        <option value="98">2002</option>
                        <option value="99">2003</option>
                        <option value="100">2004</option>
                        <option value="101">2005</option>
                        <option value="102">2006</option>
                        <option value="103">2007</option>
                        <option value="104">2008</option>
                        <option value="105">2009</option>
                        <option value="106">2010</option>
                        <option value="107">2011</option>
                        <option value="108">2012</option>
                        <option value="109">2013</option>
                        <option value="110">2014</option>
                        <option value="111">2015</option>
                        <option value="112">2016</option>
                        <option value="113">2017</option>
                        <option value="114">2018</option>
                        <option value="115">2019</option>
                        <option value="116">2020</option>
                        <option value="116">2021</option>
                        <option value="116" selected>2022</option>
                    </select>
                </div>
            </div>
            <div class="gender">
                    <!-- Gender -->
                    <span>Gender</span>
                    <div class="male">
                        <label><i class="fa fa-male"></i> Male</label>
                        <input name="gender" type="radio" value="male" required >
                    </div>
                    <div class="fe male">
                        <label><i class="fa fa-female"></i> Female</label>
                        <input name="gender" type="radio" value="female" required>
                    </div>
                    
                    <div class="clear"></div>

            </div>
            <input type="submit" value="sing up" class="btn">
    </div>
</body>
</html>