USE [ODS]
GO

/****** Object:  Table [dbo].[BCAdmission]    Script Date: 04/06/2015 09:23:23 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

SET ANSI_PADDING ON
GO

CREATE TABLE [dbo].[BCAdmission](
	[ReferenceNumber] [int] IDENTITY(1,1) NOT NULL,
	[FirstName] [varchar](32) NOT NULL,
	[LastName] [varchar](32) NOT NULL,
	[MiddleName] [varchar](16) NULL,
	[DOB] [datetime] NOT NULL,
	[Amount] [decimal](10, 2) NULL,
	[ProgramofStudy] [varchar](255) NULL,
	[ReferenceNumberCreation] [datetime] NOT NULL,
	[BillingFirstName] [varchar](32) NULL,
	[BillingLastName] [varchar](32) NULL,
	[BillingEmail] [varchar](200) NULL,
	[BillingPhoneNumber] [varchar](10) NULL,
	[PaymentAuthorization] [datetime] NULL,
	[PaymentSettled] [datetime] NULL,
 CONSTRAINT [PK_Admission] PRIMARY KEY CLUSTERED
(
	[ReferenceNumber] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

GO

SET ANSI_PADDING OFF
GO

ALTER TABLE [dbo].[BCAdmission] ADD  CONSTRAINT [DF_BCAdmission_ReferenceNumberCreation]  DEFAULT (getdate()) FOR [ReferenceNumberCreation]
GO
