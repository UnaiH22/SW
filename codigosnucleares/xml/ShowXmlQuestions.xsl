<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:template match="/">
    <html>
        <body>
          <h2>Transformación XSL</h2>
          <table border="1">
            <tr>
              <th>Autor</th>
              <th>Enunciado</th>
              <th>Respuesta Correcta</th>
              <th>Respuestas Incorrectas</th>
              <th>Tema</th>
            </tr>
            <xsl:for-each select="assessmentItems/assessmentItem">
            <tr>
              <td><xsl:value-of select="@author"/></td>
              <td><xsl:value-of select="itemBody/p"/></td>
              <td><xsl:value-of select="correctResponse/response"/></td>
              <td><xsl:for-each select="incorrectResponses/response">
                -<xsl:value-of select="."/><br/>
                </xsl:for-each></td>
              <td><xsl:value-of select="@subject"/></td>
            </tr>
            </xsl:for-each>
          </table>
        </body>
        </html>
  </xsl:template>

</xsl:stylesheet>