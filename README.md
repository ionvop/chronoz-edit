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
- **(&lt;bpm&gt;)** - Set the beats per minute. Default is 120.
- **{&lt;beat&gt;}** - Set how many beat divisions are in a measure. Default is 4.
- **m&lt;speed&gt;;** - Set the speed of the minute hand where 1 is equal to 90 degrees per beat.
- **h&lt;speed&gt;;** - Set the speed of the hour hand where 1 is equal to 90 degrees per beat.
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

### Example

```
o1.5;(160){4}
m0.25;r10:4:2;s1.1:4:2;,,,,
r-10:4:3;s1.2:4:3;,,,,
h1;r360:6:1;y360:6:1;s0.5:6:1;,,,,
,,r-180;y-360;r0:2:2;y0:1:2;s1:1:2;,,

{8}
h0.125;1,1,,1,,1,,1,
,1,,1,,1,,,
1,1,,1,,1,,1,
,1,,1,,1,,,
```

<details><summary>Explanation</summary>

Set offset to 1.5 seconds `o1.5;` with an initialized BPM of 160 `(160)` and beat divisions of 4 per measure `{4}`.

The chart begins with the minute hand speed set to 0.25 (22.5 degrees per beat) `m0.25;`, rotating to 10 degrees at a span of 4 beats easing out `r10:4:2;`, and scaling to 110% at a span of 4 beats easing out `s1.1:4:2;`.

After 4 beat divisons `,,,,`, rotate to -10 degrees at a span of 4 beats easing in and out `r-10:4:3;`, and scale to 120% at a span of 4 beats easing in and out `s1.2:4:3;`.

After another 4 beat divisons `,,,,`, set the hour hand speed to 1 (90 degrees per beat) `h1;`, rotate to 360 degrees at a span of 6 beats easing in `r360:6:1;`, move the Y position to 360 at a span of 6 beats easing in `y360:6:1;`, and scale to 50% at a span of 6 beats easing in `s0.5:6:1;`.

After 6 beat divisons `,,,,,,`, rotate to -180 degrees `r-180;` and move the Y position to -360 in an instant `y-360;`, rotate to 0 degrees `r0:2:2;`, move the Y position to 0 at a span of one beat easing out `y0:1:2;`, and scale to 100% at a span of 2 beats easing out `s1:1:2;`.

After 2 beat divisions `,,`, set the hour hand speed to 0.125 (11.25 degrees per beat) `h0.125;`, and apply the note pattern consisting of taps `1,1,,1,,1,,1,`.

</details>