# TLS Compatibility

## What is TLS(Transport Layer Security)?

Transport Layer Security, or TLS is a protocol that provides privacy and data integrity between two communicating applications and it is the most widely deployed security protocol used today. A primary use case of TLS is encrypting the communication between web applications and servers, such as web browsers loading a website. TLS is used for web browsers and other applications that require data to be securely exchanged over a network and ensures that a connection to a remote endpoint is the intended endpoint through encryption and endpoint identity verification.


## TLS in LoginRadius

LoginRadius is committed to using strong encryption methods and to maintain a strong cryptographic infrastructure. 

To prepare for the upcoming industry-wide disabling of TLS 1.0/1.1 and to maintain our compliances, LoginRadius has disabled TLS 1.0/1.1 from all of our APIs and services. While most of the browsers/clients won’t be affected while making API calls, there might be some older or deprecated versions causing the issue. The older browser versions won’t be able to load the websites complying TLS 1.2.

## Why the Need of a TLS Upgrade

The reason behind upgrade of TLS is the mandate issued by PCI Security Standards Council, the organization that oversees security standards related to online payments. They have found several security vulnerabilities with TLS 1.0. The latest PCI compliance standards require that any site accepting credit card payments use TLS 1.2.
 

## Browser Compatibility Details

<table>
<thead>
<tr>
<th id="0C0" class="column-headers-background">Browser</th>
<th id="0C1" class="column-headers-background">Version</th>
<th id="0C2" class="column-headers-background">Compatibility Status</th>
</tr>
</thead>
<tbody>
<tr>
<td class="s1" dir="ltr">Microsoft Edge</td>
<td class="s1" dir="ltr">Desktop and mobile versions</td>
<td class="s1" dir="ltr">Compatible</td>
</tr>
<tr>
<td class="s1" dir="ltr" rowspan="2">Internet Explorer</td>
<td class="s2" dir="ltr">Desktop and mobile IE version 11</td>
<td class="s1" dir="ltr">Compatible</td>
</tr>
<tr>
<td class="s1" dir="ltr">Version 9 and 10</td>
<td class="s1" dir="ltr">Compatible when run in Windows 7 or newer, but not by default see Internet Explorer Support for TLSv1.2 for details</td>
</tr>
<tr>
<td class="s1" dir="ltr" rowspan="2">Mozilla Firefox</td>
<td class="s1" dir="ltr">Version 27 and above</td>
<td class="s1" dir="ltr">Compatible</td>
</tr>
<tr>
<td class="s1" dir="ltr">Version 23-26</td>
<td class="s1" dir="ltr">Compatible but not by default</td>
</tr>
<tr>
<td class="s1" dir="ltr" rowspan="2">Google Chrome</td>
<td class="s1" dir="ltr">Google Chrome 38 and higher</td>
<td class="s1" dir="ltr">Compatible</td>
</tr>
<tr>
<td class="s1" dir="ltr">Google Chrome 22 to 37</td>
<td class="s3 softmerge" dir="ltr">
<div>Capable when run in Windows XP SP3, Vista, or newer (desktop), OS X 10.6 (Snow Leopard) or newer (desktop), or Android 2.3 (Gingerbread) or newer (mobile)</div>
</td>
</tr>
<tr>
<td class="s1" dir="ltr">Google Android OS Browser</td>
<td class="s2" dir="ltr">Android 5.0 (Lollipop) and higher</td>
<td class="s2" dir="ltr">Compatible</td>
</tr>
<tr>
<td class="s1" dir="ltr" rowspan="2">Apple Safari</td>
<td class="s1" dir="ltr">Desktop Safari versions 7 and higher for OS X 10.9 (Mavericks) and higher</td>
<td class="s2" dir="ltr">Compatible</td>
</tr>
<tr>
<td class="s2" dir="ltr">Mobile Safari versions 5 and higher for iOS 5 and higher</td>
<td class="s2" dir="ltr">Compatible</td>
</tr>
</tbody>
</table>



## Operating systems which support TLS 1.2 

<table>
<thead>
<tr>
<th id="0C0" class="column-headers-background">OS</th>
<th id="0C1" class="column-headers-background">Version</th>
<th id="0C2" class="column-headers-background">Compatibility Status</th>
</tr>
</thead>
<tbody>
<tr >
<td class="s2" dir="ltr">Windows</td>
<td class="s3" dir="ltr">Windows 7 and Newer</td>
<td class="s2" dir="ltr">Compatible</td>
</tr>
<tr >
<td class="s4"></td>
<td class="s3" dir="ltr">Windows Server 2008 R2 and Newer</td>
<td class="s2" dir="ltr">Compatible</td>
<tr >
<td class="s2" dir="ltr">Linux</td>
<td class="s5" dir="ltr">Ubuntu - 14.04 +</td>
<td class="s2" dir="ltr">Compatible</td>
</tr>
<tr >
<td class="s4"></td>
<td class="s5" dir="ltr">Red Hat (RHEL) 6.5 +</td>
<td class="s2" dir="ltr">Compatible</td>
</tr>
<tr >
<td class="s4"></td>
<td class="s5" dir="ltr">CentOS 6.8+</td>
<td class="s2" dir="ltr">Compatible</td>
</tr>
<tr >
<td class="s4"></td>
<td class="s5" dir="ltr">Debian - 7.0 (Wheezy)+</td>
<td class="s2" dir="ltr">Compatible</td>
</tr>
<tr >
<td class="s2" dir="ltr">Android</td>
<td class="s6" dir="ltr">Android API 20 (Andriod 4.4w) and higher</td>
<td class="s4" dir="ltr">Compatible for All browsers and applications</td>
</tr>
<tr >
<td class="s2" dir="ltr">iOS</td>
<td class="s3" dir="ltr">versions 8+ </td>
<td class="s4" dir="ltr">Compatible, TLS 1.2 is enabled by default</td>
</tr>
</tbody>
</table>

## Language / Framework Compatibility

<table>
<thead>
<tr>
<th id="0C0" style="width:260px" class="column-headers-background">Language / Framework</th>
<th id="0C1" style="width:564px" class="column-headers-background">Version</th>
<th id="0C2" style="width:1046px" class="column-headers-background">Compatiblity Status</th>
</tr>
</thead>
<tbody>
<tr >
<td class="s2" dir="ltr">.NET</td>
<td class="s3" dir="ltr">Version 4.5 or Newer</td>
<td class="s4" dir="ltr">Compatible</td>
</tr>
<tr >
<td class="s2" dir="ltr">Java</td>
<td class="s3" dir="ltr">Version 7 (1.7) and newer</td>
<td class="s4" dir="ltr">Compatible</td>
</tr>
<tr >
<td class="s2" dir="ltr">PHP/Ruby/Node.js</td>
<td class="s3" dir="ltr">With OpenSSL version 1.0.1 and higher</td>
<td class="s4" dir="ltr">Compatible </td>
</tr>
<tr >
<tr >
<td class="s2" dir="ltr">Python</td>
<td class="s3" dir="ltr">Version 2.7.9</td>
<td class="s4" dir="ltr">Compatible, only if you have the latest TLS library installed</td>
</tr>
</tbody>
</table>

**Note:** If you are still not clear about TLS1.2 compatibility on your server, please contact to your webmaster for compatibility details.

If you’ve any questions or facing any issues related to TLS compatibility, feel free to contact [LoginRadius Support](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket).
