# chronoz-edit
A chart editor for a work-in-progress rhythm game ChronoZ, an attempt at recreating the clock-based rhythm game [Compaz](https://www.taptap.io/app/235768) which hasn't had any updates since 2022.

## Requirements

- PHP 5.2+

## Installation Instructions

1. Clone or download the project files from the repository.

    ```
    git clone https://github.com/ionvop/chronoz-edit.git
    cd chronoz-edit
    ```

2. Run the following command to start the web server.

    ```
    php -S localhost:8000
    ```

3. Open your web browser and navigate to `http://localhost:8000` to access the editor.

## Notation System

The editor uses a text-based notation system inspired by the [simai notation system](https://w.atwiki.jp/simai/pages/1003.html) to represent the chart. Here are the available notations:

- **o&lt;offset&gt;;** - Set the starting position of the chart.
- **(&lt;bpm&gt;)** - Set the beats per minute.
- **{&lt;beat&gt;}** - Set how many beat divisions are in a measure.
- **m&lt;speed&gt;;** - Set the speed of the minute hand.
- **h&lt;speed&gt;;** - Set the speed of the hour hand.
- **1** - Add a tap note on the outer circle.
- **2** - Add a drag note on the outer circle.
- **3** - Add a flick note on the outer circle.
- **4** - Add a tap note on the inner circle.
- **5** - Add a drag note on the inner circle.
- **6** - Add a flick note on the inner circle.
- **,** - Move forward in the timeline by one beat division.
- **x&lt;target value&gt;:&lt;[length]&gt;:&lt;[ease]&gt;;**
- **y&lt;target value&gt;:&lt;[length]&gt;:&lt;[ease]&gt;;**
- **s&lt;target value&gt;:&lt;[length]&gt;:&lt;[ease]&gt;;**
- **r&lt;target value&gt;:&lt;[length]&gt;:&lt;[ease]&gt;;**
    - Change the value of a property to the target value over the length of given beats (not beat divisions) at a given ease.
        - x - X position
        - y - Y position
        - s - Scale
        - r - Rotation
    - If ease is omitted, the change will be linear.
        - 0 - linear
        - 1 - ease in
        - 2 - ease out
        - 3 - ease in and out
    - If length is omitted, the change will be instant.